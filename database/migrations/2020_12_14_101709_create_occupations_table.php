<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advisor_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->timestamps();
            $table->foreign('advisor_id')
                ->references('id')
                ->on('advisors')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
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
        Schema::dropIfExists('occupations');
    }
}
