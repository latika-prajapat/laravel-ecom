<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::paginate(5);
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        // Validate Data
        // Process Data 
        // Return Response

        $category = new Category();
        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;

            // Use image compress and upload library
            // Image intervention composer package
        }
        
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->status = $request->input('status')==TRUE ? '1':'0';
        $category->save();
        
        return redirect('/categories')->with('status','category added successfully');
    }
    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        
            $file= $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
            
        $category->name = $request->input('name');
        $category->desc = $request->input('desc');
        $category->status = $request->input('status')==TRUE ? '1':'0';
        $category->update();
        
        return redirect('/categories')->with('status','category edited successfully');

    }
    
    public function destroy($id)
    {
        $category=Category::find($id);
        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        
        $category->delete();
        return redirect('/categories')->with('status','category deleted successfully');
    }

}

