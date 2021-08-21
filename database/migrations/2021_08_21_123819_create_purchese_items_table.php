<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurcheseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchese_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchese_invoice_id');
            $table->foreignId('product_id');
            $table->double('quantity');
            $table->double('price');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchese_items');
    }
}
