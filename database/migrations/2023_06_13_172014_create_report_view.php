<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW report AS
            SELECT  SELECT m.name AS merchant_name, c.name AS city_name, oi.date, oi.order_id, oi.quantity, oi.product_id, oi.user_id
            FROM merchant m
            JOIN city c ON m.city_id = c.city_id
            JOIN products p ON m.merchant_id = p.merchant_id
            JOIN order_item oi ON p.product_id = oi.product_id
            JOIN user u ON oi.user_id = u.user_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_view');
    }
}
