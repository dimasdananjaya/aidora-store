<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('product_type', function (Blueprint $table) {
            $table->bigIncrements('id_type');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->unsignedBigInteger('id_type');
            $table->string('product_name');
            $table->decimal('sell_price');
            $table->decimal('base_price');
            $table->decimal('discount_price');
            $table->string('description');
            $table->string('status');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->timestamps();

            $table->foreign('id_type')->references('id_type')->on('product_type');
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id_image');
            $table->unsignedBigInteger('id_product');
            $table->int('orders');
            $table->timestamps();

            $table->foreign('id_product')->references('id_product')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
