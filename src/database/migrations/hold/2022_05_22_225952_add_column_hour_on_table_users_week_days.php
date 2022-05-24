<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnHourOnTableUsersWeekDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_week_day', function (Blueprint $table) {
            $table->integer('launch_hour_id')->unsigned()->default(2);
            $table->foreign('launch_hour_id')->references('id')->on('day_hour');
            $table->integer('dinner_hour_id')->unsigned()->default(8);
            $table->foreign('dinner_hour_id')->references('id')->on('day_hour');
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
            $table->dropForeign('users_week_day_launch_hour_id_foreign');
            $table->dropColumn('launch_hour_id');
            $table->dropForeign('users_week_day_dinner_hour_id_foreign');
            $table->dropColumn('dinner_hour_id');
        });
    }
}
