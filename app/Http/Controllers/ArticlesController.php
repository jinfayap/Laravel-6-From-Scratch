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
    public function show(Article $article) {

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
        // $validatedAttributes = request()->validate([
        //     'title' => 'required',
        //     'exerpt' => 'required',
        //     'body' => 'required'
        // ]);
        // cleanup?
        
        $validatedAttributes = $this->validatedArticle();
        Article::create($validatedAttributes);

/*         Article::create([
            'title' => request('title'),
            'exerpt' => request('exerpt'),
            'body' => request('body'),

        ]); */

        return redirect('/articles');
    }

    // Show a view to edit an existing resource
    public function edit(Article $article) {
        // find the article assoicated to the id in the uri

 
        return view('articles.edit', compact('article'));
    }

    // Persist the edited resource
    public function update(Article $article) {

/*         $validatedAttributes = request()->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required'
        ]); */

        $validatedAttributes = $this->validatedArticle();
        
        $article->update($validatedAttributes);

        return redirect('/articles/'.$article->id);

    }

    public function validatedArticle() {
        return request()->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required'
        ]);
    }
    // Delete the resource
    public function destroy() {
        
    }
}
