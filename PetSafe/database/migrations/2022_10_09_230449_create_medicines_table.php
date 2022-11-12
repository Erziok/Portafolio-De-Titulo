<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('activeSubstance', 75);
            $table->string('function', 45);
            $table->string('implementation', 150);
            $table->string('laboratory', 45);
            $table->string('specie', 45);
            $table->integer('price');
            $table->string('discount', 5);
            $table->foreignId('service_id')->nullable(true)->constrained();
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
};

