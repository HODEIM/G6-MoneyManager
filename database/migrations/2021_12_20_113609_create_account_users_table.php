<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_users', function (Blueprint $table) {
            $table->id();
            $table->boolean('active');
            $table->unsignedBigInteger('id_account');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_permission');
            $table->timestamps();
            $table->foreign('id_account')->references('id')->on('accounts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_permission')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_users');
    }
}
