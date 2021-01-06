<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()
                ->constrained('addresses')->onDelete('cascade');
            $table->enum('status',['open','confirmed','on_delivery','finished'])->nullable();
            $table->enum('payment',['COD','wallet','bank_transaction','credit'])->nullable();
            $table->foreignId('coupon_id')->nullable()
                ->constrained('coupons')->onDelete('cascade');
            $table->string('comment')->comment('may require')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->string('transaction_image')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
