<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('pro_name')->unique();
            $table->string('pro_slug')->index();
            $table->string('pro_avatar')->nullable();
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('admin_id')->index();
            $table->integer('price')->default(0);
            $table->tinyInteger('sale')->default(0);
            $table->integer('view_count')->default(0);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
