<?php

namespace App\Http\Controllers\Admin;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;
use Carbon\Carbon;


class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   
    {
       
        return view('admin.banners.create');
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
            'heading' => 'required',
            'para' => 'required |max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $banners = new Banner();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $path = 'banners/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('/app/public/') . $path)) 
            {
                File::makeDirectory(storage_path('/app/public/') . $path, 0775, true);
            }
            
            Image::make($file)->encode('jpg', 90)->save(storage_path('/app/public/') . $path . $filename);
            $banners->image = $path . $filename;
        }
        
        $banners->heading = $request->heading;
        $banners->para = $request->para;
        $banners->status = $request->status == TRUE ? 1 : 0;
        $banners->save();

        return redirect(route('banners.index'))->with('status', 'banner added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banners = Banner::find($id);
        return view('admin.banners.show', compact('banners'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::find($id);
        return view('admin.banners.edit', compact('banners'));
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
            'heading' => 'required',
            'para' => 'required |max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $banners = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            if (File::exists(storage_path('app/public/' . $banners->image))) 
            {
                File::delete(storage_path('app/public/' . $banners->image));
            }
            $file = $request->file('image');
            $path = 'banners/' . Carbon::now()->format('FY') . '/';
            $filename = time() . '.jpg';
            if (!File::exists(storage_path('app/public/') . $path)) 
            {
                File::makeDirectory(storage_path('app/public/') . $path, 0775, true);
            }
            Image::make($file)->encode('jpg', 90)->save(storage_path('app/public/') . $path . $filename);
            $banners->image = $path . $filename;
        }
        $banners->heading = $request->heading;
        $banners->para = $request->para;
        $banners->status = $request->status == TRUE ? 1 : 0;
        $banners->update();
        return redirect(route('banners.index'))->with('status', 'banner edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banners = Banner::find($id);
        if ($banners->image) 
        {
            if (File::exists(storage_path('app/public/' . $banners->image))) 
            {
                File::delete(storage_path('app/public/' . $banners->image));
            }
        }

        $banners->delete();
        return redirect(route('banners.index'))->with('status', 'banner deleted successfully');
    }
}
