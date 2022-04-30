<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->string('name')->default('unknown')->unique();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('mass')->nullable();
            $table->string('hair_color')->default('unknown');
            $table->string('birth_year')->default('unknown');
            $table->foreignId('gender_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('homeworld_id')->nullable()->constrained()->cascadeOnDelete();
            $table->date('created')->nullable();
            $table->text('url')->nullable();

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
