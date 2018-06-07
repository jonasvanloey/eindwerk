<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTitleAddPostingIdToPortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->integer('posting_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('posting_id');
            $table->string('title');

        });
    }
}
