<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class AddHeaderImage extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->integer('header_image_id');
        });

        Schema::table('rainlab_blog_posts', function($table)
        {
            $table->integer('header_image_id');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('header_image_id');
        });

        Schema::table('rainlab_blog_posts', function($table)
        {
            $table->dropColumn('header_image_id');
        });
    }

}
