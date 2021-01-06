<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProductColorSizeToProductQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_quantities', function (Blueprint $table) {
            $table->dropForeign(['product_size_id']);
            $table->dropColumn('product_size_id');
            $table->dropForeign(['product_color_id']);
            $table->dropColumn('product_color_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_quantities', function (Blueprint $table) {
            $table->foreignId('product_size_id')->constrained('product_sizes')
                ->onDelete('cascade');
            $table->foreignId('product_color_id')->constrained('product_colors')
                ->onDelete('cascade');
        });
    }
}
