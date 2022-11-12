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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title', 45);
            $table->date('incidentDate');
            $table->longText('description', 250);
            $table->string('photo', 250);
            $table->tinyInteger('active');
            $table->foreignId('user_id')->nullable(true)->constrained();
            $table->foreignId('animal_id')->nullable(true)->constrained();
            $table->foreignId('category_id')->nullable(true)->constrained();
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
        Schema::dropIfExists('publications');
    }
};
