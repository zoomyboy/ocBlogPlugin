<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class ShowPostsCategories extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->integer('show_posts');
			$table->integer('show_categories');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('show_posts');
			$table->dropColumn('show_categories');
        });
    }

}
