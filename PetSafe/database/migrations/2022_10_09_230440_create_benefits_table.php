<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->tinyInteger('active');
            $table->foreignId('user_id')->nullable(true)->constrained();
            $table->foreignId('benefit_type_id')->nullable(true)->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('benefits')->insert([     
            ['name' => 'Veterinaria Municipal',
             'description' => 'Veterinarias bajo el funcionamiento de la municipalidad',
             'active' => 1,
             'benefit_type_id' => 1,
            ],   

            ['name' => 'Curso municipal',
             'description' => 'Cursos gestionados por la municipalidad',
             'active' => 1,
             'benefit_type_id' => 4,
            ], 
            ['name' => 'Procedimiento clinico',
             'description' => 'Procedimientos clinicos organizados por la municipalidad',
             'active' => 1,
             'benefit_type_id' => 1,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefits');
    }
};
