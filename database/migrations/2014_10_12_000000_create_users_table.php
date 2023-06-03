<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

return new class extends Migration
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
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('login');
            $table->string('email');
            $table->string('password');
            $table->boolean('is_admin')->default(false);
        });

        DB::table('users')->insert([
            [
                'name' => 'Илья',
                'surname' => 'Каргаполов',
                'patronymic' => 'Александрович',
                'login' => 'admin',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('admin55'),
                'is_admin' => true
            ]
        ]);
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
};
