<?php
namespace App\Http\Controllers;
use App\Models\replaycomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class replycommentController extends Controller
{

    public function index(Request $request, $message){
        $request->validate(['replycomment'=>'required|max:100']);
        $replyComment= new replaycomment();
        $replyComment->message_id= $message;
        $replyComment->user_id= Auth::id();
        $replyComment->replycomment=$request->replycomment;
        $replyComment->save();
        return redirect()->back();
    }
}
