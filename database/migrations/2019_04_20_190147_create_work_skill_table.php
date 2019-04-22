<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_work', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedinteger('work_id');
            $table->unsignedinteger('skill_id');
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works');
            $table->foreign('skill_id')->references('id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_work');
    }
}
