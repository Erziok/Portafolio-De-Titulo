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
        Schema::create('canine_areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('comment');
            $table->string('url');
            $table->string('photo');
            $table->tinyInteger('active')->default('2');
            $table->foreignId('benefit_id')->nullable(true)->constrained();
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
        Schema::dropIfExists('canine_areas');
    }
};
