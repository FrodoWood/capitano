<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variant_attributes', function (Blueprint $table) {
            $table->unique(['product_variant_id', 'attribute_id'], 'unique_product_variant_attribute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variant_attributes', function (Blueprint $table) {
            $table->dropUnique('unique_product_variant_attribute');
        });
    }
};
