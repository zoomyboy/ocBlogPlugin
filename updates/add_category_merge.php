<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class AddCategoryMerge extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->integer('merge_categories_with_posts');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('merge_categories_with_posts');
        });
    }
}
