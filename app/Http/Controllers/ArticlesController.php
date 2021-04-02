<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Tag;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Reder a list of resource
    public function index() {

        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
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

        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    // Persist the new resource
    public function store() {
        // persist the new artcle
 
        // $validatedAttributes = $this->validatedArticle();
        // Article::create($validatedAttributes);

        // Just for this tweak before authentication
        $this->validatedArticle();
        $article = new Article(request(['title', 'exerpt', 'body']));
        $article->user_id = 1; // hardcoding this at the moment. normally use auth()->id()
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
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

        // return redirect(route('articles.show', $article) );
        return redirect($article->path());

    }

    public function validatedArticle() {
        return request()->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required',
            'tags' =>'exists:tags,id'
        ]);
    }
    // Delete the resource
    public function destroy() {
        
    }
}
