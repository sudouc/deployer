<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('host_title')->nullable();
            $table->string('host');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('keyLocation')->nullable();
            $table->text('keyText')->nullable();
            $table->string('keyPhrase')->nullable();
            $table->string('agent')->nullable();
            $table->string('timeout')->nullable();
            $table->increments('id');
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
        Schema::dropIfExists('servers');
    }
}
