<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function status(Request $request)
    {

        $user = User::findOrFail($request->id);
        $user->status=$request->statu =="true"? '1' : '0';
        $user->save();
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->info('Kullanıcı Silindi!', 'Başarılı');
        return redirect()->route('admin.users.index');

    }

}
