<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('previlege_id')->unsigned();
            $table->string('token')->unique();
            $table->string('identity')->unique();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('city');
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->boolean('has_pic')->default(false);
            $table->string('pic')->nullable();
            $table->string('transaction')->nullable();
            $table->timestamps();
            $table->foreign('previlege_id')
                ->references('id')
                ->on('previleges')
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
        Schema::dropIfExists('orders');
    }
}
