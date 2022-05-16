<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('attendance_month');
            $table->year('attendance_year');
            $table->date('attendance_date');
            $table->string('in_time');
            $table->string('out_time');
            $table->string('late_time');
            $table->enum('attendance_status', ['P', 'A', 'W', 'H', 'L', 'S', 'AL', 'CL', 'MT', 'MA', 'PT']);
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
