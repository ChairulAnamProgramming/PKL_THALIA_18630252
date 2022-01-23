<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //Pelatihan Kerja
        Schema::create('work_trainings', function (Blueprint $table) {
            $table->id();
            // Nama Pelatihan Kerja
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('agency_name');
            $table->text('address');
            $table->text('email');
            $table->string('phone');
            $table->foreignId('education_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // Tanggal Berlaku
            $table->date('effective_date');
            $table->text('image');
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
        Schema::dropIfExists('work_trainings');
    }
}
