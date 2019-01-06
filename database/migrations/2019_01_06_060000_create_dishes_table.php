<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('prototype_id')->nullable();

            $table->string('name');
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();

            $table->unsignedSmallInteger('time_preparation')->nullable();
            $table->unsignedSmallInteger('time_making')->nullable();
            $table->unsignedTinyInteger('persons_min')->nullable();
            $table->unsignedTinyInteger('persons_max')->nullable();

            $table->text('stages_json')->nullable();
            $table->text('gallery_json')->nullable();

            $table->boolean('is_public');

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
        Schema::dropIfExists('dishes');
    }
}
