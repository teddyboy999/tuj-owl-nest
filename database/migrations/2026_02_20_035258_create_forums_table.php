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
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string("forum_author");
            $table->string("forum_author_email");
            $table->longText("forum_content");
            $table->integer("forum_likes");
            $table->integer("forum_dislikes");

            $table->string("parent_post_id");
            $table->boolean("is_reply");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
