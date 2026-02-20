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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id()->first();
            $table->timestamps();

            // Organization Detail(s)
            $table->string("org_name")->unique();
            $table->longText("org_description");
            $table->string("org_leader_temple_id")->unique();
            $table->string("org_leader_name");
            $table->string("org_leader_email")->unique();
            $table->string("org_type")->default("organization"); // has to be one of: organization, affinity, sports, culture, veteran.
            $table->boolean("org_is_active");

            // Organization Social(s)
            $table->string("org_email");
            $table->string("org_instagram")->nullable();
            $table->string("org_discord")->nullable();
            $table->string("org_twitter")->nullable();
            $table->string("org_website")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
