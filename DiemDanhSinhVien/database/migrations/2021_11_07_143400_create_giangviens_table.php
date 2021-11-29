<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangviens', function (Blueprint $table) {
            $table->string('magv', 10)->primary();
            $table->string('tengv', 255);
            $table->tinyInteger('gioitinh');
            $table->date('ngaysinh');
            $table->string('diachi', 255);
            $table->string('sdt', 14);
            $table->string('anh', 255);
            $table->string('makhoa_id', 10);
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
        Schema::dropIfExists('giangviens');
    }
}
