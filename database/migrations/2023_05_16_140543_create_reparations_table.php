<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id();
            $table->string("label")->default("none");
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->unsignedBigInteger('marque_id');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');
            $table->string("code")->default("none");
            $table->string("status")->default("reparation");
            $table->string("description")->default("description none");
            $table->string("prix")->default("0");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparations');
    }
};
