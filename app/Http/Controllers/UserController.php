<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    //
    public function list()
    {
        $users = User::all();
        return response()->json([
            'code'      =>  0,
            'message'   =>  '成功',
            'data'      =>  $users
        ]);
    }

    public function one(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json([
            'code'      =>  0,
            'message'   =>  '成功',
            'data'      =>  $user
        ]);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  =>  'bail|required',
            'sex'   =>  'bail|required',
            'desc'  =>  'bail|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'      =>  1,
                'message'   =>  $validator->errors()->first(),
                'data'      =>  null
            ]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->desc = $request->desc;
        $user->save();
        return response()->json([
            'code'      =>  0,
            'message'   =>  '成功',
            'data'      =>  null
        ]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'    =>  'bail|required',
            'name'  =>  'bail|required',
            'sex'   =>  'bail|required',
            'desc'  =>  'bail|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code'      =>  1,
                'message'   =>  $validator->errors()->first(),
                'data'      =>  null
            ]);
        }

        User::where('id', $request->id)->update($request->all());
        return response()->json([
            'code'      =>  0,
            'message'   =>  '成功',
            'data'      =>  null
        ]);
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return response()->json([
            'code'      =>  0,
            'message'   =>  '成功',
            'data'      =>  null
        ]);
    }
}
