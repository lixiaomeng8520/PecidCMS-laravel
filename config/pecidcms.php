<?php

return [
    'rules' =>  [
        'user.add'  =>  [
            'username'  =>  'bail|required',
            'password'  =>  'bail|required',
            'nickname'  =>  'bail|required',
            'sex'       =>  'bail|required',
            'desc'      =>  'bail|required',
        ],
        'user.edit' =>  [
            'id'        =>  'bail|required|integer',
            'password'  =>  ['bail', 'regex:/^[a-zA-Z\d]{3,}$/'],
            'nickname'  =>  'bail|required|max:2',
            'sex'       =>  'bail|required',
            'desc'      =>  'bail|max:255',
        ],
        'user.delete'   =>  [
            'id'    =>  'bail|required',
        ]
    ]
];