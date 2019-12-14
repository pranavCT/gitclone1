<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMaterialLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_material_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_material_id');
            $table->integer('file_type');
            $table->string('file_path');
            $table->tinyInteger('status')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('course_material_logs');
    }
}
