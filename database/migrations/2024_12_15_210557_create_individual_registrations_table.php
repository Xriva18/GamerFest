<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('individual_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('game');
            $table->string('image_path');
            $table->timestamps();
        });
    }
};
