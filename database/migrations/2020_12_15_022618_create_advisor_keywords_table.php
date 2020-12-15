<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisorKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisor_keywords', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advisor_id')->unsigned();
            $table->bigInteger('keyword_id')->unsigned();
            $table->timestamps();
            $table->foreign('advisor_id')
                ->references('id')
                ->on('advisors')
                ->onDelete('cascade');
            $table->foreign('keyword_id')
                ->references('id')
                ->on('keywords')
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
        Schema::dropIfExists('advisor_keywords');
    }
}
