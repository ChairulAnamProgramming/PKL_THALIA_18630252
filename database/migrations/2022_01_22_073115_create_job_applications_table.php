<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //Lamaran Kerja
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_vacancy_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('population_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['panding', 'received', 'rejected', 'stop']);
            $table->timestamp('date_received')->nullable();
            $table->timestamp('stop_date')->nullable();
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
        Schema::dropIfExists('job_applications');
    }
}
