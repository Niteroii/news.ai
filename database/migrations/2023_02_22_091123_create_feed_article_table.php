<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    /**
     * @return void

    public string $title;
    public ?string $date;
    public string $text;
    public string $html;
    public string $markdown;
    public string $banner;
    public string $summary;
    public ?array $authors;
    public ?array $keywords;
    public ?array $images;
    public ?array $entities;
     */

    public function up()
    {
        Schema::create('feeds_article', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feed_id')->nullable();
            $table->string('source')->nullable();
            $table->string('title')->nullable();
            $table->string('date')->nullable();
            $table->longText('text');
            $table->longText('html');
            $table->longText('markdown');
            $table->string('banner');
            $table->longText('summary');
            $table->json('authors')->nullable();
            $table->json('keywords')->nullable();
            $table->json('images')->nullable();
            $table->json('entities')->nullable();
            $table->json('sentiment')->nullable();
            $table->json('social')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds_article');
    }
};
