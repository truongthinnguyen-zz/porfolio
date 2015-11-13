<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructureArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('subtitle')->after('title');
            $table->renameColumn('content', 'content_raw');
            $table->text('content_html')->after('content');
            $table->string('page_image')->after('content_html');
            $table->string('meta_description')->after('page_image');
            $table->string('layout')->after('is_published')->default('blog.layouts.article');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('layout');
            $table->dropColumn('meta_description');
            $table->dropColumn('page_image');
            $table->dropColumn('content_html');
            $table->renameColumn('content_raw', 'content');
            $table->dropColumn('subtitle');
        });
    }
}
