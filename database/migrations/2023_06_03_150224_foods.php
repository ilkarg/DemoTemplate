<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->integer('price');
            $table->string('country');
            $table->string('category');
            $table->string('ingredients');
        });

        DB::table('foods')->insert([
            [
                'name' => 'Уха',
                'image' => '/assets/uha.jpg' ,
                'price' => 1000000,
                'country' => 'Россия',
                'category' => 'Супы',
                'ingredients' => 'Суп, рыба'
            ],
            [
                'name' => 'Борщ',
                'image' => '/assets/borsch.jpg',
                'price' => 1000,
                'country' => 'Россия',
                'category' => 'Супы',
                'ingredients' => 'Красная вода, капуста, картошка'
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
        Schema::dropIfExists('foods');
    }
};
