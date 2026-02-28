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
        Schema::create('post_replies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId("parent_post_id")->constrained(table: "post", column: "id");
            $table->string("reply_author");
            $table->string("reply_author_email");
            $table->longText("reply_content");
            $table->integer("reply_likes");
            $table->integer("reply_dislikes");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_replies');
    }
};
