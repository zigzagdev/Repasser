<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_name','20')->comment('商品名');
            $table->string('item_category','5')->comment('商品カテゴリー')->default('0');
            $table->string('item_content','255')->comment('商品説明');
            $table->string('recommend_flag')->comment('商品おすすめフラグ')->default('0');
            $table->string('image')->comment('商品イメージ画像');
//            $table->integer('admin_id')->unsigned()->comment('ユーザーIDとの紐付き');
            $table->softDeletes();
            $table->timestamps();

//            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
