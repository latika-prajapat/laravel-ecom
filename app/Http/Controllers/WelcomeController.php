<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        
        $categories = Category::where('status', '1')->get();
        $banners = Banner::where('status', '1')->get();
        $featured_products = Product::where('status', '1')->get();
        return view('welcome.index', compact('featured_products', 'categories', 'banners'));
    }
}
