<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TutorVerificationFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_verification_files',function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tutor_verification_id');
            $table->string('path_name');
            $table->string('name');
            $table->timestamps();



            $table->foreign('tutor_verification_id')->references('id')->on('tutor_verifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
