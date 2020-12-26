<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previleges', function (Blueprint $table) {
            $table->id();
            $table->enum('name',['free','start','academy','institute','university','all'])->default('free');
            $table->bigInteger('price')->default(0);
            $table->integer('quota_faculty')->default(2);
            $table->integer('quota_department')->default(2);
            $table->bigInteger('quota_advisor')->default(20);
            $table->bigInteger('quota_student')->default(20);
            $table->bigInteger('quota_document')->default(20);
            $table->bigInteger('quota_template')->default(1);
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
        Schema::dropIfExists('previleges');
    }
}
