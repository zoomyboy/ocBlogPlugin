<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class AddShowPublished extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->integer('show_published_in');
			$table->integer('show_published_date');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->deleteColumn('show_published_in');
			$table->deleteColumn('show_published_date');
        });
    }

}
