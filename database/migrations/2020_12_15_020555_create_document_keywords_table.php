<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_keywords', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_id')->unsigned();
            $table->bigInteger('keyword_id')->unsigned();
            $table->timestamps();
            $table->foreign('document_id')
                ->references('id')
                ->on('documents')
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
        Schema::dropIfExists('document_keywords');
    }
}
