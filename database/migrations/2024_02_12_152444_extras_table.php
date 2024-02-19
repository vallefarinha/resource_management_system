<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->string('extra_name');
            $table->string('extra_link');
            $table->unsignedBigInteger('id_tag');
            $table->foreign('id_tag')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('id_resource');
            $table->foreign('id_resource')->references('id')->on('resources')->onDelete('cascade');
        });
    }


    public function down(): void
    {
   
    }
};
