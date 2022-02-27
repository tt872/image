<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collects extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'store_number' => 'required',
        'store_name' => 'required',
        'comment' => 'required',

    ); //
}
