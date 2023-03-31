<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMerchandiseToTypeInProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `products` CHANGE `type` `type` ENUM('Physical','Digital','License', 'Merchandise') NOT NULL DEFAULT 'Physical';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `products` CHANGE `type` `type` ENUM('Physical','Digital','License') NOT NULL DEFAULT 'Physical';");
    }
}
