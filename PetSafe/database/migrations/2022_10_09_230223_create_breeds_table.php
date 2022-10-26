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
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('breed');
            $table->foreignId('specie_id')->nullable(true)->constrained();
            $table->timestamps();
        });

        DB::table('breeds')->insert([     
            // Dogs
            ['breed' => 'Akita', 'specie_id' => 1],     
            ['breed' => 'Alaskan Husky', 'specie_id' => 1], 
            ['breed' => 'American Foxhound', 'specie_id' => 1], 
            ['breed' => 'Beagle', 'specie_id' => 1],   
            ['breed' => 'Border Collie', 'specie_id' => 1],  
            ['breed' => 'Bóxer', 'specie_id' => 1],   
            ['breed' => 'Bulldog', 'specie_id' => 1],       
            ['breed' => 'Chow Chow', 'specie_id' => 1],             
            ['breed' => 'Fox Terrier', 'specie_id' => 1], 
            ['breed' => 'Galgo', 'specie_id' => 1],     
            ['breed' => 'Golden Retriever', 'specie_id' => 1],  
            ['breed' => 'Mudi', 'specie_id' => 1],     
            ['breed' => 'Pastor Alemán', 'specie_id' => 1],  
            ['breed' => 'Pastor Australiano', 'specie_id' => 1], 
            ['breed' => 'Pastor Shetland', 'specie_id' => 1],         
            ['breed' => 'Pointer Inglés', 'specie_id' => 1],   
            ['breed' => 'Pug', 'specie_id' => 1],       
            ['breed' => 'Quiltro', 'specie_id' => 1],  
            ['breed' => 'San Bernardo', 'specie_id' => 1],  
            ['breed' => 'Shar Pei', 'specie_id' => 1],        
            ['breed' => 'Shepadoodle', 'specie_id' => 1],      
            ['breed' => 'Yorkshire Terrier', 'specie_id' => 1], 
            ['breed' => 'Otro', 'specie_id' => 1],    
            
            // Cats
            ['breed' => 'British Shorthair', 'specie_id' => 2],   
            ['breed' => 'Americano', 'specie_id' => 2],   
            ['breed' => 'Angora Turco', 'specie_id' => 2],  
            ['breed' => 'Ashera', 'specie_id' => 2],  
            ['breed' => 'Bambino', 'specie_id' => 2],  
            ['breed' => 'Balinés', 'specie_id' => 2],  
            ['breed' => 'Bengala', 'specie_id' => 2],
            ['breed' => 'Birmano', 'specie_id' => 2],  
            ['breed' => 'Britanico', 'specie_id' => 2],   
            ['breed' => 'Chantilly-Tiffany', 'specie_id' => 2],  
            ['breed' => 'Himalayo', 'specie_id' => 2],   
            ['breed' => 'Manx', 'specie_id' => 2],  
            ['breed' => 'Neva Masquerade', 'specie_id' => 2],  
            ['breed' => 'Phynx', 'specie_id' => 2],  
            ['breed' => 'Scottish Fold', 'specie_id' => 2],  
            ['breed' => 'Siamés', 'specie_id' => 2],  
            ['breed' => 'Thai', 'specie_id' => 2],     
            ['breed' => 'Toyger', 'specie_id' => 2],   
            ['breed' => 'Otro', 'specie_id' => 2],  
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
};
