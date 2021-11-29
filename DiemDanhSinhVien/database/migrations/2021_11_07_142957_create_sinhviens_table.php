<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->string('masv', 10)->primary();
            $table->string('tensv', 255);
            $table->tinyInteger('gioitinh');
            $table->date('ngaysinh');
            $table->string('diachi', 255);
            $table->string('sdt', 14);
            $table->string('anh', 255);
            $table->string('malop_id', 10);
            $table->foreign('malop_id')->references('malop')->on('lops');
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
        Schema::dropIfExists('sinhviens');
    }
}
