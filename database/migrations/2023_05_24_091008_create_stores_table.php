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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_social")->default("nombre_social");
            $table->string("cif")->default("cif");
            $table->string("direction")->default("direction");
            $table->string("localisation")->default("localisation");
            $table->string("zip")->default("zip");
            $table->string("pays")->default("pays");
            $table->string("phone")->default("phone");
            $table->string("whatssap")->default("whatssap");
            $table->string("site")->default("site");
            $table->string("email")->default("email");
            $table->string("logo")->default("logo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
