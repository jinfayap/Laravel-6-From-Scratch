<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

/*     public function getRouteKeyName() {
        return 'slug'; // Article::where('slug', $article->first())
    } */

    // protected $fillable = ['title', 'exerpt', 'body'];
    // User::create(request->all()) [dangerous] // ['name' => 'newname, 'subscriber' => true]

    protected $guarded = []; // No guarding against Article::create

    public function path() {
        return route('articles.show', $this);
    }

/*     public function user() {
        return $this->belongsTo(User::class); // something like select * from user where article_id = ''
    } */

    public function author() { // method does not work => null, unless provide 'user_id' as a foreign key below
        return $this->belongsTo(User::class, 'user_id' ); // something like select * from user where article_id = ''
    }
}
