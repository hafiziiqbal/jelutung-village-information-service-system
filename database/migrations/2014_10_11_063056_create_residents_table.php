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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique()->index();
            $table->string('card_number', 16)->constrained('family_cards', 'card_number')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('gender');
            $table->string('birthplace');
            $table->date('birthday');
            $table->string('religion');
            $table->string('qualification');
            $table->string('profession_type');
            $table->string('blood_group')->nullable();
            $table->string('marital_status');
            $table->string('wedding_date')->nullable();
            $table->string('family_relationship');
            $table->string('citizenship');
            $table->string('passport_number')->nullable();
            $table->string('kitap_number')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('life_status');
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
        Schema::dropIfExists('residents');
    }
};
