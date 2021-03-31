<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


/* 
- Creates an migration table: php artisan make:migratation create_posts_table
- Migrate all tables to database: php artisan make:migrate
- Add addtional column to existing table: php artisan make:migration add_title_to_posts_table and
migrate the column to table: php artisan make:migrate
- To rollback: php artisan migrate:rollback
- To drop and recreate table: php artisan migrate:fresh


*/
class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
