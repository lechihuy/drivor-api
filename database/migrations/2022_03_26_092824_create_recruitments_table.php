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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('cv_path');
            $table->string('job_application_path');
            $table->enum('working_time', ['fulltime', 'unstable'])->default('fulltime');
            $table->string('id_frontside_path');
            $table->string('id_backside_path');
            $table->string('license_frontside_path');
            $table->string('license_backside_path');
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
        Schema::dropIfExists('recruitments');
    }
};
