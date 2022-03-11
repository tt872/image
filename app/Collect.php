<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'store_number' => 'required',
        'store_name' => 'required',
        'comment' => 'required',

    );
    public function getImagesAttribute()
    {
        return collect([$this->imageone_path, $this->imagetwo_path, $this->imagethree_path]);
    }
}
