<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsLaunchAndDinnerOnTableUsersWeekDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_week_day', function (Blueprint $table) {
            $table->boolean('launch')->default(1);
            $table->boolean('dinner')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_week_day', function (Blueprint $table) {
            $table->dropColumn('launch');
            $table->dropColumn('dinner');
        });
    }
}
