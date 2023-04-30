<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("writer_id");
            $table->bigInteger("category_id");
            $table->char('image_url',100)->nullable();
            $table->char('title_fa',150);
            $table->text('text_fa');
            $table->char('title_en',150)->nullable();
            $table->text('text_en')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
