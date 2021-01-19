<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterStatusToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE carts MODIFY COLUMN status ENUM('open','confirmed','canceled','refused','finished') NULL ");
//        Schema::table('carts', function (Blueprint $table) {
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE carts MODIFY COLUMN status ENUM('open','confirmed','on_delivery','finished') NULL ");
//        Schema::table('carts', function (Blueprint $table) {
//
//        });
    }
}
