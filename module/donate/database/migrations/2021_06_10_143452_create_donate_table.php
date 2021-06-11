<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donate', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->nullable();
            $table->double('amount')->default(0);
            $table->string('donate_for')->nullable();
            $table->enum('status',['active','disable'])->default('disable');
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
        Schema::dropIfExists('donate');
    }
}
