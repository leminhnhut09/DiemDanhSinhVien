<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCahocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cahocs', function (Blueprint $table) {
            $table->string('macahoc', 10)->primary();
            $table->time('thoigianbd');
            $table->time('thoigiankt');
            $table->tinyInteger('tietbd');
            $table->tinyInteger('tietkt');
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
        Schema::dropIfExists('cahocs');
    }
}
