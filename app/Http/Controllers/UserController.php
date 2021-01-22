<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\PecidCMS\Helper;

class UserController extends Controller
{
     
    //
    public function list()
    {
        $users = User::all();
        return Helper::response(1, '成功', $users);
    }

    public function one($id)
    {
        $user = User::find($id);
        return Helper::response(1, '成功', $user);
    }

    public function add(Request $request)
    {
        // (new User)->fill($request->all())->save();
        $fields = ['username', 'password', 'nickname', 'sex', 'desc'];
        User::insert($request->only($fields));
        return Helper::response();
    }

    public function edit(Request $request)
    {
        $fields = ['password', 'nickname', 'sex', 'desc'];
        if ($request->has('password') && $request->password !== '') {
            $request->merge([
                'password'  =>  \md5($request->password)
            ]);
        } else {
            unset($fields[0]);
        }
        
        User::where('id', $request->id)->update($request->only($fields));
        return Helper::response();
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return Helper::response();
    }
}
