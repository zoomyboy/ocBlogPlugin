<?php namespace RainLab\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;
use RainLab\Blog\Models\Category as CategoryModel;

class AddOrderColumn extends Migration
{

    public function up()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->integer('order_by');
			$table->integer('global_order_by');
			$table->integer('order_reverse');
        });
    }

    public function down()
    {
        Schema::table('rainlab_blog_categories', function($table)
        {
            $table->dropColumn('order_by');
			$table->dropColumn('global_order_by');
			$table->dropColumn('order_reverse');
        });
    }

}
