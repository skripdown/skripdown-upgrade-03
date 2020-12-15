<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejected_proposals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advisor_id')->unsigned();
            $table->bigInteger('document_id')->unsigned();
            $table->timestamps();
            $table->foreign('advisor_id')
                ->references('id')
                ->on('advisors')
                ->onDelete('cascade');
            $table->foreign('document_id')
                ->references('id')
                ->on('documents')
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
        Schema::dropIfExists('rejected_proposals');
    }
}
