<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class AddLayoutOption extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->string('layout');
        });

        Schema::table('rainlab_blog_posts', function($table)
        {
            $table->string('layout');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('layout');
        });

        Schema::table('rainlab_blog_posts', function($table)
        {
            $table->dropColumn('layout');
        });
    }

}
