<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\message;


class commentController extends Controller
{
    public function index(){
        $comments = message::all();
        return view('admin.comment.comment',compact('comments'));
    }
    public function destroy($id){
        $comment = message::find($id);
        $comment->delete();
        return redirect()->back();

    }

}
