<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentDirectory', function (Blueprint $table) {
            $table->integer('rollno');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('dept');
            $table->string('yearofgrad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentDirectory');
    }
}
