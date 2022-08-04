<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

// this method overrides the default id query to the mentions param when in controller we use model binding in methods
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
