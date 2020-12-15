<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examiners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advisor_id')->unsigned();
            $table->bigInteger('exam_id')->unsigned();
            $table->integer('role')->default(1);
            $table->boolean('pass')->default(false);
            $table->timestamps();
            $table->foreign('advisor_id')
                ->references('id')
                ->on('advisors')
                ->onDelete('cascade');
            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examiners');
    }
}
