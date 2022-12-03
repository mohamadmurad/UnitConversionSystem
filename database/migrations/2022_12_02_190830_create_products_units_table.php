<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_units', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Products::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Units::class)->constrained()->cascadeOnDelete();;
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_units');
    }
}
