<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('donation_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('charity_id');
            $table->string('items', 30);
            $table->string('contact_person', 50);
            $table->string('pickup_location', 255);
            $table->string('mobile', 11);
            $table->string('quantity', 255);
            $table->string('note', 255);
            $table->string('status', 20);
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
