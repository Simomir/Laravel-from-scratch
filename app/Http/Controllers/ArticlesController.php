<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    // Render a list of a resource
    public function index () {
        if (\request('tag')) {
            $articles = Tag::where('name', \request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    // Show a single resource
    public function show(Article $article) {
        return view('articles.show')->with('article', $article);
    }

    // Show a view to create a new resource
    public function create() {
        return view('articles.create');
    }

    // Persist the new resource
    public function store() {
        $validated = $this->validateArticle();

        Article::create($validated);

        return redirect(route('articles.index'));
    }

    // Show a view to edit an existing resource
    public function edit(Article $article) {
        return view('articles.edit')->with('article', $article);
    }

    // Persist the edited resource
    public function update(Article $article) {
        $validated = $this->validateArticle();

        $article->update($validated);

        return redirect($article->path());
    }

    // Delete the resource
    public function destroy() {

    }

    protected function validateArticle(): array
    {
        return \request()->validate([
                'title' => ['required'],
                'excerpt' => ['required'],
                'body' => ['required']
        ]);
    }
}
