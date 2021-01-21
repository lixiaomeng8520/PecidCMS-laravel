<?php

return [
    'rules' =>  [
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
    ]
];