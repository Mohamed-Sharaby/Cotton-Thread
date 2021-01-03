<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_quantities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->foreignId('product_size_id')->constrained('product_sizes')
                ->onDelete('cascade');
            $table->foreignId('product_color_id')->constrained('product_colors')
                ->onDelete('cascade');
            $table->boolean('is_ban')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('product_quantities');
    }
}
