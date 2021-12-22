<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangvienMonhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien_monhoc', function (Blueprint $table) {
            $table->integer('mahp')->primary();
            $table->string('magv_id', 10);
            $table->string('mamh_id', 10);
            $table->integer('namhoc_id');
            $table->tinyInteger('hocky_id');
            $table->foreign('magv_id')->references('magv')->on('giangviens');
            $table->foreign('mamh_id')->references('mamh')->on('monhocs');
            $table->foreign(['namhoc_id', 'hocky_id'])->references(['namhoc', 'hocky'])->on('hockys');
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
        Schema::dropIfExists('giangvien_monhoc');
    }
}
