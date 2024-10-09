<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id')->primary();
            $table->string('user_name');
            $table->string('user_gender');
            $table->string('user_city');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
