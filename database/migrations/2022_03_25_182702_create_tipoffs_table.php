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
        Schema::create('tipoffs', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('knowledge');
            $table->string('state_crime');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal');
            $table->point('location')->nullable();
            $table->string('datetime')->nullable();
            $table->text('description');
            $table->text('assessment');
            $table->integer('person_id')->nullable()->constrained();
            $table->enum('status', ['pending', 'approved', 'rejected', 'ignored']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoffs');
    }
};
