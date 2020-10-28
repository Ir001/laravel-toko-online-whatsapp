<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('category_sellers');
            $table->bigInteger('province_id')->nullable();
            $table->bigInteger('regency_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('village_id')->nullable();
            $table->smallInteger('status')->default('0'); /* 0 = Polos, 1 = Sudah verif email,  2 = peringatan, 3 = Banned */
            $table->smallInteger('is_verified')->default('0'); /* 0 = Belum verif, 1 = Badge verif */
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
