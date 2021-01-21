<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\PecidCMS\Helper;

class Validate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $rules = [
            'user.add'  =>  [
                'name'  =>  'bail|required',
                'sex'   =>  'bail|required',
                'desc'  =>  'bail|required',
            ],
            'user.edit' =>  [
                'id'    =>  'bail|required',
                'name'  =>  'bail|required',
                'sex'   =>  'bail|required',
                'desc'  =>  'bail|required',
            ],
            'user.delete'   =>  [
                'id'    =>  'bail|required',
            ]
        ];

        if (!array_key_exists(Route::currentRouteName(), $rules)) return $next($request);
            
        $rule = $rules[Route::currentRouteName()];

        $data = $request->only(array_keys($rule));
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return Helper::response(0, $validator->errors()->first());
        }
        
        return $next($request);
    }
}
