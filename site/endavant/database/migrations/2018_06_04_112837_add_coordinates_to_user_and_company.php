<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoordinatesToUserAndCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('latitude');
            $table->string('longtitude');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->string('latitude');
            $table->string('longtitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longtitude');
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longtitude');
        });
        //
    }
}
