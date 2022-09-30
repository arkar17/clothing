<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('category_id');
            $table->string('cloth_name')->nullable();
            $table->string('cloth_type')->nullable();
            $table->string('size')->nullable();
            $table->integer('price')->default(0);
            $table->integer('discount_price')->nullable()->default(0);
            $table->integer('quantity')->default(0);
            $table->string('color')->nullable();
            $table->string('photos')->nullable();
            $table->boolean('favourite_status')->nullable()->default(0);
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // wishlist
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cloths');
    }
};
