<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscriptionPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->double('total_price')->default(200);
        });

        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->double('total_price')->default(200);
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
            $table->dropColumn('total_price');
        });

        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
}
