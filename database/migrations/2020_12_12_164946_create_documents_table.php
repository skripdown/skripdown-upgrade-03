<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('faculty_id')->unsigned();
            $table->bigInteger('super_id')->unsigned();
            $table->bigInteger('template_id')->unsigned();
            $table->string('title');
            $table->string('url');
            $table->boolean('submit')->default(false);
            $table->text('meta_content');
            $table->text('content')->nullable();
            $table->text('parsed_ontent')->nullable();
            $table->text('chapter_i')->nullable();
            $table->text('chapter_ii')->nullable();
            $table->text('chapter_iii')->nullable();
            $table->text('chapter_iv')->nullable();
            $table->text('chapter_v')->nullable();
            $table->text('attachment')->nullable();
            $table->timestamps();
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
                ->onDelete('cascade');
            $table->foreign('super_id')
                ->references('id')
                ->on('supers')
                ->onDelete('cascade');
            $table->foreign('template_id')
                ->references('id')
                ->on('templates')
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
        Schema::dropIfExists('documents');
    }
}
