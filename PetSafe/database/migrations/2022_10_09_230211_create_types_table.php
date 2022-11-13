<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type', 45);
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('types')->insert([     
            ['type' => 'Veterinaria'],     
            ['type' => 'Farmacia'], 
            ['type' => 'Pyme'],
            ['type' => 'Negocio'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};