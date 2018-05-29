<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMadeOnToFavorites extends Migration
{
    public function up()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dateTime('made_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('made_on');
        });
    }
}
