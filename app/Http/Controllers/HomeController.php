<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $posts = post::latest()->take(6)->get();
        return view('frontend.index', compact('posts'));
    }
    public function postss(){
        $posts = post::with('category')->Published()->latest()->paginate(6);
        return view('frontend.post', compact('posts'));
    }
    public function singlepost($slug){
        $post = post::where('slug', $slug)->Published()->first();

        $postKey= 'post_'.$post->id;
        if(!Session::has($postKey)){
            $post->increment('view_count');
            Session::put($postKey, 1);

        }

        return view('frontend.singlepost', compact('post'));
    }
    public function categoryPost($slug){
        $categories= category::where('slug', $slug)->first();
        $posts= $categories->post()->paginate(6);
        return view('frontend.categoryPost', compact('posts'));
    }

    public function search(Request $request){
        $request->validate([
            'search'=>'required| max:120'
        ]);
        $search= $request->search;
        $posts = post::where('title', 'like',"%$search%")->paginate(8);
        $posts->appends(['search'=> $search]);
        return view('frontend.search',compact('posts','search'));
    }
    public function tagPost($name){
        $tags = tag::where('name', 'like',"%$name%")->paginate(8);
        $tags->appends(['name'=> $name]);
        return view('frontend.tagPost',compact('tags'));
    }

public function postLike($post){
        $user = Auth::user();
        $LikePost = $user->postLike()->where('post_id', $post)->count();
        if($LikePost == 0){
            $user->postLike()->attach($post);
        }else{
            $user->postLike()->detach($post);
        }
        return redirect()->back();
}

}
