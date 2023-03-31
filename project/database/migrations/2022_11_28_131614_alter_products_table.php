<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('is_printify', [0, 1])->default(0);
            $table->text('printify_product_id')->nullable();
            $table->string('printify_product_update_date')->nullable();
            $table->longText('size_price')->change();
            $table->longText('size')->change();
            $table->longText('size_qty')->change();
            $table->longText('size_price')->change();
            $table->longText('color')->change();
            $table->longText('printify_variant_id')->nullable()->after('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('is_printify');
            $table->dropColumn('printify_product_id');
            $table->dropColumn('printify_product_update_date');
            $table->dropColumn('printify_variant_id');
        });
    }
}
