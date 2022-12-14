<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;

// this method overrides the default id query to the mentions param when in controller we use model binding in methods
//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }

    public string $title;
    public string $excerpt;
    public string $body;

    protected $table = 'articles';
    protected $connection = 'mysql';
    protected $fillable = ['title', 'excerpt', 'body'];

    public function path(): string
    {
        return route('articles.show', $this);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
