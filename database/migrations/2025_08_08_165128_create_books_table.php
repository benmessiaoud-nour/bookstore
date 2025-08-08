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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->unsignedInteger('ibsn');
            $table->unsignedInteger('nbr_of_pages');
            $table->text('description')->nullable();
            $table->unsignedInteger('publish_year');
            $table->unsignedInteger('nbr_of_copies');
            $table->decimal('price',8,2);
            $table->string('cover_image');
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
