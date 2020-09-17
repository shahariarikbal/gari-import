<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stocks_id')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->double('grade')->nullable();
            $table->string('chasis_code')->nullable();
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->string('engine_cc')->nullable();
            $table->string('mileage')->nullable();
            $table->string('fuel')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fob')->nullable();
            $table->string('cnf')->nullable();
            $table->string('seat')->nullable();
            $table->string('door')->nullable();
            $table->text('description')->nullable();


            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('price')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
