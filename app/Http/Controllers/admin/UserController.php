<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Models\role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return  view('admin.user.user', compact('users',));
    }

    public function edit($id)
    {
        $user =User::find($id);
        $roles =role::all();
        return view('admin.user.update', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'role_id' => 'required|unique',
//        ]);
        $user = User::find($id);
            if(Auth::user()->id == $id){
                return redirect()->back();
            }
                $user->role_id=$request->role;
                $user->save();
                return redirect()->back();
    }

    public function userdelete($id)
    {
        $user = User::find($id);
        if(Auth::user()->id == $id){
            return redirect()->back();
        }
        if($user->image !== 'image.png' && Storage::disk('public')->exists('user/'.$user->image)){
            Storage::disk('public')->delete('user/'.$user->image);
        }
        $user->delete();
        return redirect()->back();
    }


}
