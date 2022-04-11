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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('mass')->nullable();
            $table->string('hair_color');
            $table->string('birth_year');
            $table->foreignId('gender_id')->constrained()->cascadeOnDelete();
            $table->foreignId('homeworld_id')->constrained()->cascadeOnDelete();
            $table->date('created')->nullable();
            $table->text('url');
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
        Schema::dropIfExists('people');
    }
};
