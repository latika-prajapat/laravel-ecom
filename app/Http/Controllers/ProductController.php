<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status', '1')->get();

        // select * from products where title LIKE '%$search%'
        $featured_products = Product::where('status', '1');

        // Search Filter
        $search = $request->search;
        if ($search) {
            $featured_products = $featured_products->where('name', 'LIKE', "%{$search}%");
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
            $featured_products = $featured_products->whereBetween('selling_price', $ranges[$priceRange]);
        }
        //order sort 
        $sort = $request->sort;
        if ($sort === 'latest') {
            // return('working latetst');
            $featured_products = $featured_products->orderBy('created_at', 'DESC');
        } elseif ($sort === 'oldest') {
            // return('working oldest');
            $featured_products = $featured_products->orderBy('created_at', 'ASC');
        }
        // color filter
        $color = $request->color;
        if ($color) {
            $featured_products = $featured_products->whereIn('color', [$color]);
        }
        // size filter
        $size = $request->size;
        if ($size) {
            $featured_products = $featured_products->whereIn('size', [$size]);
        }
        $featured_products = $featured_products->get();

        return view('welcome.product.index', compact('featured_products', 'categories'));
    }
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        $categories = Category::where('status', '1')->get();

        $featured_products = Product::where('status', '1')->take(4)->get();
        return view('welcome.product.show', compact('featured_products', 'categories', 'product'));
    }
}
