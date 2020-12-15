<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('advise_id')->unsigned();
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->string('read_time')->nullable();
            $table->timestamps();
            $table->foreign('advise_id')
                ->references('id')
                ->on('advises')
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
        Schema::dropIfExists('revisions');
    }
}
