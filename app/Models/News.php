<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    use HasFactory;
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','categoryID');
    }
}
