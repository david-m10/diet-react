<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    const TABLE = 'dishes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
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

            $table->boolean('is_public')->default(false);

            $table->timestamps();
        });

        Schema::table(self::TABLE, function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE);
    }
}
