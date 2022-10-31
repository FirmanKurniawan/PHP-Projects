<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('status', ['not yet' ,'on progress' ,'done'])->default('not yet');
            $table->timestamp('deadline')->default(null);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_admin')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_lists');
    }
};
