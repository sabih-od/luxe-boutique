<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPayoutTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('payout_time')->nullable();
        });

        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->string('payout_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn('payout_time');
        });

        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn('payout_time');
        });
    }
}
