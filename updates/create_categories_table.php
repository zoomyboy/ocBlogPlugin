<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('rainlab_blog_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->index();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();
			$table->integer('show_description');
			$table->integer('show_posts_description');
			$table->integer('shorten_posts_description_by');
			$table->integer('shorten_posts_excerpt_by');
			$table->integer('show_posts_title');
			$table->integer('link_posts_title');
			$table->integer('jssor1_id')->nullable()->unsigned();
			$table->integer('jssor2_id')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::create('rainlab_blog_posts_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('post_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['post_id', 'category_id']);
        });
    }

    public function down()
    {
        Schema::drop('rainlab_blog_categories');
        Schema::drop('rainlab_blog_posts_categories');
    }

}
