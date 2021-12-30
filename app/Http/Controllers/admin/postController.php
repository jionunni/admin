<?php

namespace App\Http\Controllers\admin;
use App\Models\category;
use App\Models\post;
use App\Models\User;
use App\Mail\newpost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::latest()->get();
        return view('admin.post.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =category::all();
        return view('admin.post.post_create',compact('categories'));
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
            'title'=>'required|max:100|unique:posts',
            'image'=>'required|image|mimes:jpg,png,jpeg',
            'category'=>'required',
            'body'=>'required',

        ]);
//        image
        $image = $request->image;
        $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }
        // Image Croped

        $image->storeAs('post', $imageName, 'public');

        $post = New post();
        $post->title=$request->title;
        $post->slug=Str::slug($request->title, '-');
        $post->category_id=$request->category;
        $post->user_id=Auth::id();
        $post->image=$imageName;
        $post->body=$request->body;
        if(isset($request->status)){
            $post->status = 1;
        }
        $post->save();
//Email Notification send
        if($post->status){
            $users= User::all();
            foreach ($users as $user){
                Mail::to($user->email)->queue(new newpost($post));
            }
        }

        $tags = [];
        $stingTags = explode(',', $request->tags);
        foreach ($stingTags as $tag) {
            array_push($tags, ['name' => $tag]);
        }
        $post->tag()->createMany($tags);

            return redirect()->route('post');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('admin.post.postview',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =post::find($id);
        $categories = category::all();
        return view('admin.post.post_update', compact('post','categories'));
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
        $post= post::findOrFail($id);
        if($request->image != null){
            $image = $request->image;
            $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            if(Storage::disk('public')->exists('post/'.$post->image)){
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $image->storeAs('post', $imageName, 'public');
        }else{
            $imageName =$post->image;
        }

        $post->title=$request->title;
        $post->slug=Str::slug($request->title, '-');
        $post->category_id=$request->category;
        $post->image=$imageName;
        $post->body=$request->body;
        if(isset($request->status)){
            $post->status = 1;
        }
        $post->save();
        if($post->status){
            $users= User::all();
            foreach ($users as $user){
                Mail::to($user->email)->queue(new App\Mail\newpost($post));
            }
        }
        $post->tag()->delete();

        $tags = [];
        $tages =Str::upper($request->tags);
        $stingTags = explode(',', $tages);
        foreach ($stingTags as $tag) {
            array_push($tags, ['name' => $tag]);
        }
        $post->tag()->createMany($tags);

        return redirect()->route('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= post::findOrFail($id);
        if(Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
        }

        $post->destroy($id);
        return redirect()->back();
    }

}
