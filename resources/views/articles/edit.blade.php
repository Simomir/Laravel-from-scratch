@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>
            <form method="post" action="/articles/{{$article->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="title" class="label">Title</label>
                    <div class="contol">
                        <input type="text" class="input" name="title" id="title" value="{{ $article->title }}" />
                    </div>
                </div>
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt" cols="30" rows="10">{{ $article->excerpt }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label for="body" class="label">Body</label>
                    <div class="control">
                        <textarea class="textarea" name="body" id="body" cols="30" rows="10">{{ $article->body }}</textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
