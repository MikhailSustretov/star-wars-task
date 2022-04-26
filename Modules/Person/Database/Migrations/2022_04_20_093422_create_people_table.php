<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->string('name')->default('unknown');
            $table->unsignedInteger('height')->nullable()->default(null);
            $table->unsignedInteger('mass')->nullable()->default(null);
            $table->string('hair_color')->default('unknown');
            $table->string('birth_year')->default('unknown');
            $table->foreignId('gender_id')->default(0)->constrained()->cascadeOnDelete();
            $table->foreignId('homeworld_id')->default(0)->constrained()->cascadeOnDelete();
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
