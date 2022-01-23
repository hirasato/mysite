<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
     protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'target' => 'required',
    );
    
     // Profile Modelに関連付けを行う
    public function histories()
    {
        return $this->hasMany('App\HistoryProfile');

    }
}
