<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    const TABLE = 'products';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE, function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('producer_id')->nullable();
            $table->unsignedInteger('primitive_id')->nullable();

            $table->boolean('is_primitive')->default(false);

            $table->string('name');
            $table->text('description_short')->nullable();
            $table->text('description')->nullable();

            $table->decimal('mass_g')->nullable();
            $table->decimal('energy_kcal')->nullable();
            $table->decimal('energy_kj')->nullable();
            $table->decimal('fat')->nullable();
            $table->decimal('saturates')->nullable();
            $table->decimal('saturated_fatty_acids')->nullable();
            $table->decimal('carbohydrate')->nullable();
            $table->decimal('sugars')->nullable();
            $table->decimal('fibre')->nullable();
            $table->decimal('protein')->nullable();
            $table->decimal('salt')->nullable();

            $table->timestamps();
        });

        Schema::table(self::TABLE, function (Blueprint $table) {
            $table->foreign('producer_id')->references('id')->on('producers');
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
