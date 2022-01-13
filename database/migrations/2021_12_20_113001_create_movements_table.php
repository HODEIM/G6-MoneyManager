<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->double('amount');
            $table->string('description');
            $table->date('date');
            $table->unsignedBigInteger('id_concept');
            $table->unsignedBigInteger('id_account');
            $table->timestamps();
            $table->foreign('id_concept')->references('id')->on('concepts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_account')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
