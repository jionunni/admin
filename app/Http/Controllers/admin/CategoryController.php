<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::orderBy('id','desc')->paginate(5);
        return view('admin.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category_create');
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
            'name'=>'required|unique:categories,name',

        ]);
//        image
        $image = $request->image;
        $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('public')->exists('category')) {
            Storage::disk('public')->makeDirectory('category');
        }
        $image->storeAs('category', $imageName, 'public');

        $post = category::create([
            'name'=>$request->name,
            'slug'=>str::slug($request->name,'-'),
            'description'=>$request->description,
            'image'=>$imageName,
        ]);
        if($post->save()){
            return redirect()->route('category');
        }else{
            return redirect()->back()->with('status',  'this is dulicat valur');
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('admin.category.category_update',compact('category'));
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
            'name'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',

        ]);
        $category= category::findOrFail($id);
        if($request->image != null){
            $image = $request->image;
            $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('category')) {
                Storage::disk('public')->makeDirectory('category');
            }

            if(Storage::disk('public')->exists('category/'.$category->image)){
                Storage::disk('public')->delete('category/'.$category->image);
            }
            $image->storeAs('category', $imageName, 'public');
        }else{
            $imageName =$category->image;
        }
        $category->name=$request->name;
        $category->slug=Str::slug($request->name, '-');
        $category->description=$request->description;
        $category->image=$imageName;
        if($category->save()){
            return redirect()->route('category');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category= category::findOrFail($id);
        if(Storage::disk('public')->exists('category/'.$category->image)){
            Storage::disk('public')->delete('category/'.$category->image);
        }
        $category->destroy($id);
        return redirect()->back();
    }
}
