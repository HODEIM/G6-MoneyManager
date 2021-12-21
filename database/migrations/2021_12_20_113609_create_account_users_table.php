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
            $table->integer('id_account');
            $table->integer('id_user');
            $table->integer('id_permission');
            $table->timestamps();
            $table->foreign('id_account')->references('id')->on('accounts')->onDelete()->onUpdate();
            $table->foreign('id_user')->references('id')->on('users')->onDelete()->onUpdate();
            $table->foreign('id_permission')->references('id')->on('permissions')->onDelete()->onUpdate();
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
