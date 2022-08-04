<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    // Render a list of a resource
    public function index () {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    // Show a single resource
    public function show($id) {
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    // Show a view to create a new resource
    public function create() {
        return view('articles.create');
    }

    // Persist the new resource
    public function store(Request $request) {
        $article = new Article();

        $article->save();
        return redirect('/articles');
    }

    // Show a view to edit an existing resource
    public function edit($id) {
        $article = Article::find($id);
        return view('articles.edit')->with('article', $article);
    }

    // Persist the edited resource
    public function update($id) {
        $article = Article::find($id);
        $article->save();
        return redirect('/articles'.$article->id);
    }

    // Delete the resource
    public function destroy() {

    }
}
