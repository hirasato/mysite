<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    //
    // 以下を追記
    protected $guarded = array('id');

    public static $rules = array(
        'star' => 'required',
    );
}
