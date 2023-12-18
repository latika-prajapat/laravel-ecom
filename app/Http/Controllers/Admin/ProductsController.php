<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;
use Carbon\Carbon;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $products = Product::with('category')->orderBy('created_at', 'desc')->paginate(5);
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select(
            'products.id',
            'categories.name as category_name',
            'products.name',
            'products.image',
            'products.description',
            'products.selling_price',
            'products.quantity',
            'products.status',
            'products.updated_at'
        )
        ->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $category = Category::findOrFail($request->validated()['category_id']);
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Ensure that the category_id exists in the 'categories' table
            'name' => 'required',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'selling_price' => 'required|numeric|min:0',
            'status' => 'boolean',
        ]);

        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = 'products/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('/app/public/') . $path)) {
                File::makeDirectory(storage_path('/app/public/') . $path, 0775, true);
            }

            Image::make($file)->encode('jpg', 90)->save(storage_path('/app/public/') . $path . $filename);
            $products->image = $path . $filename;
        }
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->selling_price = $request->selling_price;
        $products->quantity = $request->quantity;
        $products->status = $request->status == TRUE ? 1 : 0;
        $products->save();

        return redirect(route('products.index'))->with('status', 'product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::with('products')->get();
        $products = Product::with('category')->find($id);
        // $products = Product::find($id);
        return view('admin.products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Ensure that the category_id exists in the 'categories' table
            'name' => 'required',
            'description' => 'required|max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'selling_price' => 'required|numeric|min:0',
            'status' => 'boolean',
        ]);
        $products = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if (File::exists(storage_path('app/public/' . $products->image))) {
                File::delete(storage_path('app/public/' . $products->image));
            }
            $file = $request->file('image');
            $path = 'products/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('app/public/') . $path)) {
                File::makeDirectory(storage_path('app/public/') . $path, 0775, true);
            }
            Image::make($file)->encode('jpg', 90)->save(storage_path('app/public/') . $path . $filename);
            $products->image = $path . $filename;
        }
        $products->category_id = $request->category_id;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->selling_price = $request->selling_price;
        $products->quantity = $request->quantity;
        $products->status = $request->status == TRUE ? 1 : 0;
        $products->update();
        return redirect(route('products.index'))->with('status', 'product edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            if (File::exists(storage_path('app/public/' . $products->image))) {
                File::delete(storage_path('app/public/' . $products->image));
            }
        }

        $products->delete();
        return redirect(route('products.index'))->with('status', 'product deleted successfully');
    }
}
