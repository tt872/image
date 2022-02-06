<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'store number' => 'required',
        'store name' => 'required',
    ); //
}
