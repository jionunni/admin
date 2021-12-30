<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index(){
        $comments = message::where('user_id', Auth::id())->latest()->get();
        return view('admin.comment.comment',compact('comments'));
    }
    public function destroy($id){
        $comment = message::find($id);
       if($comment->user_id == Auth::id()){
           $comment->delete();
           return redirect()->back();
       }else{
          return redirect()->route('home');
       }


    }
}
