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
        Schema::create('component_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('component_id')->unsigned();
            $table->boolean('multiple')->default(false);
            $table->string('locale')->index();
            $table->string('slug');
            $table->string('title');
            $table->text('description');
            $table->text('image');
            $table->json('properties');
            $table->timestamps();
            $table->unique(['component_id', 'locale']);
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_translations');
    }
};
