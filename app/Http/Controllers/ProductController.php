<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status', '1')->get();

        // select * from products where title LIKE '%$search%'
        $products = Product::where('status', '1');

        // Search Filter
        $search = $request->search;
        if ($search) {
            $products = $products->where('name', 'LIKE', "%{$search}%");
        }

        // Price Filter
        $priceRange = $request->price_range;
        if ($priceRange) {
            $ranges = [
                '0-100' => [0, 100],
                '100-200' => [100, 200],
                '200-300' => [200, 300],
                '300-400' => [300, 400],
                '400-500' => [400, 500],
            ];
            $products = $products->whereBetween('selling_price', $ranges[$priceRange]);
        }
        // color filter
        $color = $request->color;
        if ($color) {
            $products = $products->orwhereIn('color', [$color]);
        }
        // size filter
        $size = $request->size;
        if ($size) {
            $products = $products->orwhereIn('size', [$size]);
        }

        //order sort
        $sort = $request->sort;
        if ($sort === 'latest') {
            // return('working latetst');
            $products = $products->orderBy('created_at', 'DESC');
        } elseif ($sort === 'oldest') {
            // return('working oldest');
            $products = $products->orderBy('created_at', 'ASC');
        }

        $products = $products->get();

        return view('welcome.product.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();


        $categories = Category::where('status', '1')->get();

        $featured_products = Product::where('status', '1')->take(4)->get();
        return view('welcome.product.show', compact('featured_products', 'categories', 'product'));
    }
    public function Addcart(Request $request, $id)
    {

        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new cart;

            $cart->name = $user->name;
            $cart->user_id = $user->id;
            $cart->product_name = $product->name;
            $cart->price = $product->selling_price * $request->quantity;
            $cart->quantity = $request->quantity;
            $cart->color = $request->input('color');
            $cart->size = $request->input('size');
            $cart->image = $product->image;
            $cart->prod_id = $product->id;

            $cart->save();

            // dd($request->all());
            return redirect()->back();

        } else {
            return redirect('login');
        }

    }



    public function Showcart()
    {
        if (Auth::id()) {
            $cart = Cart::where('user_id', Auth::id())->get();
            $categories = Category::where('status', '1')->get();
            return view('welcome.product.cart', compact('categories', 'cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();

    }
    public function checkout()
    {
        if (Auth::id()) {
            $cart = Cart::where('user_id', Auth::id())->get();
            $categories = Category::where('status', '1')->get();
            return view('welcome.product.checkout', compact('categories', 'cart'));
        }
    }


    public function place_Order(Request $request)
    {
        $user_id = auth()->user()->id;
        $cart_items = Cart::where('user_id', $user_id)->get();
        foreach ($cart_items as $cart) {
            $order = new Order;
            $order->user_id = $user_id;
            $order->product_name = $cart['Product_name'];
            $order->price = $cart['price'];
            $order->quantity = $cart['quantity'];
            $order->color = $cart['color'];
            $order->size = $cart['size'];
            $order->customer_name = $request->customer_name;
            $order->customer_email = $request->customer_email;
            $order->customer_phone = $request->customer_phone;
            $order->status = $request->status;
            $order->order_number = 'latika' . rand(100000, 999999);
            // dd($order);
            $order->save();
        }
        Cart::where('user_id', $user_id)->delete();
        return redirect()->back();



    }

    public function myorder()
    {
        if (Auth::id()) {
            $order = Order::where('user_id', Auth::id())->get();
            $categories = Category::where('status', '1')->get();
            return view('welcome.product.myorder', compact('categories', 'order'));
        } else {
            return redirect('login');
        }
    }
}
