<?php

use Cornatul\Feeds\Models\Feed;
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
    public function up()
    {
        //        'user_id',
        //        'title',
        //        'description',
        //        'image',
        //        'score',
        //        'subscribers',
        //        'url',
        //        'sync'
        Schema::create('feeds', static function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('score')->nullable();
            $table->integer('subscribers')->nullable();
            $table->string('url')->nullable();
            $table->string('sync')->nullable();
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
        Schema::dropIfExists('feeds');
    }
};
