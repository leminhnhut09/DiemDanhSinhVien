<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonhocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monhocs', function (Blueprint $table) {
            $table->string('mamh', 10);
            $table->string('tenmh', 255);
            $table->string('ghichu');
            $table->string('loai');
            $table->tinyInteger('sotinchi');
            $table->string('makhoa_id', 10);
            $table->primary(['mamh']);
            $table->foreign('makhoa_id')->references('makhoa')->on('khoas');
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
        Schema::dropIfExists('monhocs');
    }
}
