<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->integer('surface')->default(0);
            $table->integer('facade')->default(0);
            $table->integer('rdc')->default(0);
            $table->integer('petage')->default(0);
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('child_cat_id')->nullable();
            $table->longText('photo');
            $table->integer('price')->default("0");
            $table->enum('conditions', ['sale', 'rent']);
            $table->enum('fond', ['fdc', 'dab', 'mc', 'lp']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('extraction', ['yes', 'no'])->default('no');
            $table->string('video')->nullable();
            $table->string('address');
            $table->date('date_d');
            $table->string('ref');


            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_cat_id')->references('id')->on('categories')->onDelete('SET NULL');
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
        Schema::dropIfExists('products');
    }
}
