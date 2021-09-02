<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceIdOnPaymentAndReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId('sale_invioce_id')->nullable()->after('admin_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('purchese_invoice_id')->nullable()->after('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn("sale_invioce_id");
        });
        
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn("purchese_invoice_id");
        });
    }
}
