<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteToSaleInviocesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invioces', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
        Schema::table('purchese_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
        });
        Schema::table('receipts', function (Blueprint $table) {
            $table->text('note')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_invioces', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('purchese_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}
