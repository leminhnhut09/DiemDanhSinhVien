<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCahocGiangvienMonhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cahoc_giangvien_monhoc', function (Blueprint $table) {
            $table->integer('mahp_id');
            $table->string('macahoc_id', 10);
            $table->tinyInteger('tuan');
            $table->date('ngay');
            $table->tinyInteger('thu');
            $table->tinyInteger('buoi');
            $table->string('maphong_id', 10);
            $table->primary(['mahp_id', 'macahoc_id', 'tuan']);
            $table->foreign('maphong_id')->references('maphong')->on('phonghocs');
            $table->foreign('mahp_id')->references('mahp')->on('giangvien_monhoc');
            $table->foreign('macahoc_id')->references('macahoc')->on('cahocs');
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
        Schema::dropIfExists('cahoc_giangvien_monhoc');
    }
}
