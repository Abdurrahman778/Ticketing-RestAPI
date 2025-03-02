<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        Schema::create('transport', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID
            $table->string('name');
            $table->enum('type', ['bus', 'train', 'plane', 'ship']);
            $table->integer('capacity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports');
    }
};
