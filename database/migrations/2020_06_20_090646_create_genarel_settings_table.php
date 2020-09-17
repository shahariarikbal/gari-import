<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenarelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genarel_settings', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('logo');
            $table->string('favicon');
            $table->string('hotline_number');
            $table->string('instagram_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->text('footer_text');
            $table->text('contact_info');
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
        Schema::dropIfExists('genarel_settings');
    }
}
