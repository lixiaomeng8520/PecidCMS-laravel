<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function user(User $user)
    {
        return response()->json($user);
    }

    public function add()
    {

    }

    public function edit(Request $request, $id)
    {
        User::where('id', $id)->update($request->all());
        return response()->json([
            'code'  =>  0
        ]);
    }
}
