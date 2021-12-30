<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\message;
use Illuminate\Http\Request;

class massageController extends Controller
{
    public function message(Request $request, $post){
        $request->validate(['message'=>'required|max:100']);
        $message= new message();
        $message->post_id= $post;
        $message->user_id= Auth::id();
        $message->message=$request->message;
        $message->save();
        return redirect()->back();
    }
}
