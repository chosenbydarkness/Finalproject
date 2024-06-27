<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->string('preference');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}


