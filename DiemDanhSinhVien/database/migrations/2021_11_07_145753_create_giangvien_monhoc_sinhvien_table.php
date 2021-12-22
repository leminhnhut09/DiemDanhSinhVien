<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangvienMonhocSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien_monhoc_sinhvien', function (Blueprint $table) {
            $table->integer('mahp_id');
            $table->string('masv_id', 10);
            $table->string('tuan1', 255)->nullable();
            $table->string('tuan2', 255)->nullable();
            $table->string('tuan3', 255)->nullable();
            $table->string('tuan4', 255)->nullable();
            $table->string('tuan5', 255)->nullable();
            $table->string('tuan6', 255)->nullable();
            $table->string('tuan7', 255)->nullable();
            $table->string('tuan8', 255)->nullable();
            $table->string('tuan9', 255)->nullable();
            $table->string('tuan10', 255)->nullable();
            $table->string('tuan11', 255)->nullable();
            $table->string('tuan12', 255)->nullable();
            $table->string('tuan13', 255)->nullable();
            $table->string('tuan14', 255)->nullable();
            $table->string('tuan15', 255)->nullable();
            $table->string('tuan16', 255)->nullable();
            $table->string('tuan17', 255)->nullable();
            $table->string('tuan18', 255)->nullable();
            $table->string('tuan19', 255)->nullable();
            $table->string('tuan20', 255)->nullable();
            $table->primary(['mahp_id', 'masv_id']);
            $table->foreign('mahp_id')->references('mahp')->on('giangvien_monhoc');
            $table->foreign('masv_id')->references('masv')->on('sinhviens');
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
        Schema::dropIfExists('giangvien_monhoc_sinhvien');
    }
}
