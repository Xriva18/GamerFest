<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('group_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->string('game');
            $table->string('captain_name');
            $table->json('members'); // Guardar los nombres de los miembros como JSON
            $table->string('image_path');
            $table->timestamps();
        });
    }
};
