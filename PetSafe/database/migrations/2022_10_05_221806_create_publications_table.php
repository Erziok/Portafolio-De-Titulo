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
            $table->string('publication');
            $table->dateTime('incidentDate');
            $table->string('description');
            $table->tinyInteger('active');
            $table->foreignId('users_id')->constrained()->nullable(true);
            $table->foreignId('animals_id')->constrained()->nullable(true);
            $table->foreignId('categories_id')->constrained()->nullable(true);
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
