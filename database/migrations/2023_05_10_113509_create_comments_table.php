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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->text('name');
            $table->text('email');
            $table->text('body');
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('writer_status');
            $table->foreign('writer_status')->references('role_value')->on("roles")->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
