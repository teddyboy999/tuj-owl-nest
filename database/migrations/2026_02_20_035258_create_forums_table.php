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

            // TODO: Implement this
            // $table->foreignId("user_id")->constrainted(table: "users", column: "id"); // to access user profiles publicly
            $table->string("forum_author");
            $table->string("forum_author_email");
            $table->string("forum_title");
            $table->longText("forum_content");
            $table->integer("forum_likes")->default(0);
            $table->integer("forum_dislikes")->default(0);

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
