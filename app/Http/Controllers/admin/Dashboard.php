<?php

namespace App\Http\Controllers\admin;
use App\Models\post;
use App\Models\User;
use App\Models\message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class Dashboard extends Controller
{

    public function index()
    {
        $post=post::all();
        $user=User::all();
        $comments=message::all();
        return  view('admin.home', compact('post', 'user','comments'));
    }

    public function showprofile()
    {
        $user = User::find(Auth::user()->id);
        return  view('admin.profile',compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'userid'=>'required',

        ]);
        $user= User::findOrFail(Auth::user()->id);
        if($request->image != null){
            $image = $request->image;
            $imageName = Str::slug($request->name, '-') . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('user')) {
                Storage::disk('public')->makeDirectory('user');
            }

            if($user->image !== 'image.png' && Storage::disk('public')->exists('user/'.$user->image)){
                Storage::disk('public')->delete('user/'.$user->image);
            }
            $image->storeAs('user', $imageName, 'public');
        }else{
            $imageName =$user->image;
        }
        $user->name=$request->name;
        $user->userid=$request->userid;
        $user->image=$imageName;
        $user->about=$request->about;
        $user->save();
        return redirect()->back();


    }
public function change_password(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'required|max:15|confirmed'

        ]);
        $oldpassword = Auth::user()->password;
    if(Hash::check($request->old_password, $oldpassword)) {
        if(!Hash::check($request->password, $oldpassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            // Logout
            Auth::logout();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }else{
        return redirect()->back();
    }
}

}
