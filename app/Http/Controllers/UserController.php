<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function list()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function one(User $user)
    {
        return response()->json($user);
    }

    public function add(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->desc = $request->desc;
        $user->save();
        return response()->json([
            'code'  =>  0
        ]);
    }

    public function edit(Request $request, $id)
    {
        User::where('id', $id)->update($request->all());
        return response()->json([
            'code'  =>  0
        ]);
    }

    public function delete(Request $request, $id)
    {
        User::destroy($id);
        return response()->json([
            'code'  =>  0
        ]);
    }
}
