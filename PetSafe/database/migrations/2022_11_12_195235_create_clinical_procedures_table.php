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
        Schema::create('clinical_procedures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('description', 45);
            $table->string('email', 45);
            $table->string('phone', 45);
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
        Schema::dropIfExists('clinical_procedures');
    }
};
