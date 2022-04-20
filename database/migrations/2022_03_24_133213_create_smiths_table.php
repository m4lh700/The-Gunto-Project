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
    public function up()
    {
        Schema::create('smiths', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('main_image')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('rjt')->nullable();
            $table->timestamps();
            $table->string('slug')->nullable();
            $table->integer('view_count')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('stars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smiths');
    }
};
