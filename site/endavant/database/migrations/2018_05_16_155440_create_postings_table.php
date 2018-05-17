<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->json('descritpion');
            $table->json('reason');
            $table->integer('company_id')->unsigned();
            $table->integer('postingtype_id')->unsigned();
            $table->integer('student_id')->unsigned()->nullable;
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('postingtype_id')->references('id')->on('postingtypes')->onDelete('cascade');
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
        Schema::dropIfExists('postings');
    }
}
