<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('rainlab_blog_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('title')->nullable();
            $table->string('slug')->index();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content_html')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('published')->default(false);
			$table->integer('show_description');
			$table->integer('jssor1_id')->nullable()->unsigned();
			$table->integer('jssor2_id')->nullable()->unsigned();
            $table->integer('show_published_in');
			$table->integer('show_published_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('rainlab_blog_posts');
    }

}
