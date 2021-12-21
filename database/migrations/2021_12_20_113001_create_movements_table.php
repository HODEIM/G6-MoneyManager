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
            $table->integer('id_concept');
            $table->integer('id_account');
            $table->timestamps();
            $table->foreign('id_concept')->references('id')->on('concepts')->onDelete()->onUpdate();
            $table->foreign('id_account')->references('id')->on('accounts')->onDelete()->onUpdate();
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
