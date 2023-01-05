<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->char('nis')->nullable();
            $table->string('fullname');
            $table->string('username');
            $table->string('password');
            $table->string('kelas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('verif')->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->date('join_date');
            $table->date('terakhir_login');
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
        Schema::dropIfExists('users');
    }
}
