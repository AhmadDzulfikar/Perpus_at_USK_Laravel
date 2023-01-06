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
            $table->string('kode',25);
            $table->char('nis',20)->nullable();
            $table->string('fullname',125);
            $table->string('username')->unique();
            $table->text('password');
            $table->string('kelas',50)->nullable();
            $table->string('alamat',225)->nullable();
            $table->string('verif',50)->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->dateTime('join_date');
            $table->dateTime('terakhir_login')->nullable();
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
