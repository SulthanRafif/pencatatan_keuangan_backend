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
        Schema::table('financial_records', function (Blueprint $table) {
            $table->dropForeign('financial_records_category_id_foreign');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financial_records', function (Blueprint $table) {
            Schema::dropForeign('financial_records_category_id_foreign');
            Schema::dropIfExists('category_id');
        });
    }
};
