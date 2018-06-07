<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostingIdToRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->integer('posting_id')->unsigned();
            $table->integer('student_id')->unsigned()->nullable()->change();
            $table->integer('company_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropColumn('posting_id');
        });
    }
}
