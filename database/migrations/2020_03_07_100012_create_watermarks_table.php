<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatermarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('watermark')) {
            Schema::create('watermarks', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('upload_id');
//                $table->foreign('image_id')->references('id')->on('uploads')->cascadeOnDelete();
//
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watermarks');
    }
}
