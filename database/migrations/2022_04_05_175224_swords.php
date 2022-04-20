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
        Schema::create('swords', function (Blueprint $table) {
            $table->id();
            $table->integer('smith_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('sword_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('main_image')->nullable();
            $table->string('condition')->nullable();
            $table->boolean('active')->nullable();
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
        //
    }
};
