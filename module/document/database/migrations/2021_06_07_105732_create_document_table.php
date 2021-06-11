<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->integer('category')->default(0);
            $table->string('name')->nullable();
            $table->text('file_download')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('count_view')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->enum('lang_code',['vn','en'])->default('vn');
            $table->enum('status',['active','disable'])->default('active');
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
        Schema::dropIfExists('document');
    }
}
