<?php

namespace App\Models;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    use HasFactory;

// this method overrides the default id query to the mentions param when in controller we use model binding in methods
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
    /**
     * @var array|Application|Request|mixed|string|null
     */
    public $title;
    /**
     * @var array|Application|Request|mixed|string|null
     */
    public $excerpt;
    /**
     * @var array|Application|Request|mixed|string|null
     */
    public $body;
}
