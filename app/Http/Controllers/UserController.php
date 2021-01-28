<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\PecidCMS\Helper;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $token = Auth::guard('api')->attempt($request->only(['username', 'password']));
        if ($token === false) {
            return Helper::response(0, '用户名或密码错误');
        }

        return Helper::response(1, '成功', ['token' => $token]);
    }

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
                'password' => \md5($request->password),
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
