<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {

            $table->string('slug')->after('title');

            $table->unsignedBigInteger('category_id')
                  ->nullable()
                  ->after('image');

            $table->string('author')
                  ->nullable()
                  ->after('category_id');

            $table->dateTime('published_at')
                  ->nullable()
                  ->after('author');

            $table->text('meta_description')
                  ->nullable()
                  ->after('published_at');

        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {

            $table->dropColumn([
                'slug',
                'category_id',
                'author',
                'published_at',
                'meta_description'
            ]);

        });
    }
};