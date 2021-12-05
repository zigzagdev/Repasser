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
            $table->string('category_name','30')->comment('カテゴリー分類名');
            $table->string('item_content','40')->comment('商品説明');
            $table->string('recommend_flag')->comment('商品おすすめフラグ')->default('0');
            $table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}


//$table->integer('admin_id')->unsigned();
//$table->foreign('admin_id')->references('id')->on('admins');
