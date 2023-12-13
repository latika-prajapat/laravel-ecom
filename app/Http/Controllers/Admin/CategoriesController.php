<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;
use Carbon\Carbon;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required |max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $categories = new Category();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $path = 'categories/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('/app/public/') . $path)) 
            {
                File::makeDirectory(storage_path('/app/public/') . $path, 0775, true);
            }
            
            Image::make($file)->encode('jpg', 90)->save(storage_path('/app/public/') . $path . $filename);
            $categories->image = $path . $filename;
        }
        
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->status = $request->status == TRUE ? 1 : 0;
        $categories->save();

        return redirect('/categories')->with('status', 'category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
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
            'name' => 'required',
            'desc' => 'required |max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $categories = Category::findOrFail($id);
        if ($request->hasFile('image')) {
            if (File::exists(storage_path('app/public/' . $categories->image))) 
            {
                File::delete(storage_path('app/public/' . $categories->image));
            }
            $file = $request->file('image');
            $path = 'categories/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('app/public/') . $path)) 
            {
                File::makeDirectory(storage_path('app/public/') . $path, 0775, true);
            }
            Image::make($file)->encode('jpg', 90)->save(storage_path('app/public/') . $path . $filename);
            $categories->image = $path . $filename;
        }
        $categories->name = $request->name;
        $categories->desc = $request->desc;
        $categories->status = $request->status == TRUE ? 1 : 0;
        $categories->update();
        return redirect('/categories')->with('status', 'category edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        if ($categories->image) 
        {
            if (File::exists(storage_path('app/public/' . $categories->image))) 
            {
                File::delete(storage_path('app/public/' . $categories->image));
            }
        }

        $categories->delete();
        return redirect('/categories')->with('status', 'category deleted successfully');
    }
}
