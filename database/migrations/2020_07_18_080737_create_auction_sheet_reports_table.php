<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionSheetReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_sheet_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_id', 100);
                $table->unsignedInteger('payment_id');
            $table->longText('reports')->nullable();
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
        Schema::dropIfExists('auction_sheet_reports');
    }
}
