<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->integer('parent')->default(0);
            $table->string('post_type')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_mail')->nullable();
            $table->text('content')->nullable();
            $table->enum('status',['active','disable'])->default('disable');
            $table->enum('lang_code',['vn','en'])->default('vn');
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
        Schema::dropIfExists('comment');
    }
}
