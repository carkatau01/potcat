<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClickCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click_counters', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('website')->nullable();
            $table->string('language')->nullable();
            $table->string('user_agent')->nullable();
            $table->text('cookie');
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
        Schema::dropIfExists('click_counters');
    }
}
