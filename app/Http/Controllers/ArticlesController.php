<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Reder a list of resource
    public function index() {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    // Show a single resource
    public function show($id) {
        $article = Article::find($id);

        return view('articles.show', [
            'article' => $article
        ]);
    }

    // Shows a view to create a new resource
    public function create() {
        return view('articles.create');
    }

    // Persist the new resource
    public function store() {
        // persist the new artcle

        // validation?
        request()->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required'
        ]);
        // cleanup?

        $article = new Article();
        $article->title = request('title');
        $article->exerpt = request('exerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    // Show a view to edit an existing resource
    public function edit($id) {
        // find the article assoicated to the id in the uri
        $article = Article::find($id);
        
        return view('articles.edit', compact('article'));
    }

    // Persist the edited resource
    public function update($id) {

        request()->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required'
        ]);
        
        $article = Article::find($id);
        $article->title = request('title');
        $article->exerpt = request('exerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/'.$article->id);

    }

    // Delete the resource
    public function destroy() {
        
    }
}
