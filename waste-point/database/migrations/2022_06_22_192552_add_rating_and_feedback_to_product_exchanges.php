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
        Schema::table('product_exchanges', function (Blueprint $table) {
            $table->string('rating')->after('invoice_number')->nullable();
            $table->string('feedback')->after('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_exchanges', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('feedback');
        });
    }
};
