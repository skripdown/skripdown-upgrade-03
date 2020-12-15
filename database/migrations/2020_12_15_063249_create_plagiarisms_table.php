<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlagiarismsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagiarisms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned();
            $table->double('chapter_i')->default(25.5);
            $table->double('chapter_ii')->default(25.5);
            $table->double('chapter_iii')->default(25.5);
            $table->double('chapter_iv')->default(25.5);
            $table->double('chapter_v')->default(25.5);
            $table->timestamps();
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
        Schema::dropIfExists('plagiarisms');
    }
}
