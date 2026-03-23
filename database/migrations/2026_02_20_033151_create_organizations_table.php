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
            $table->id();
            $table->timestamps();

            // Organization Detail(s)
            $table->string("org_name")->unique();
            $table->longText("org_description");
            $table->string("org_leader_temple_id")->unique();
            $table->string("org_leader_name");
            $table->string("org_leader_email")->unique();
            $table->string("org_leader_program"); // study abroad (SA) || undergrad (UG) || academic english program (AEP)
            $table->string("org_co_leader_temple_id")->unique();
            $table->string("org_co_leader_name");
            $table->string("org_co_leader_email")->unique();
            $table->string("org_co_leader_program");
            $table->string("org_type")->default("organization"); // has to be one of: organization, affinity, sports, culture, veteran.
            $table->boolean("org_is_active");

            $table->string("org_semester"); // which semester (2026-1, 2026-2, 2026-3)
            $table->integer("org_number_of_members");
            $table->boolean("org_has_showa_students");

            $table->string("org_meeting_time");
            $table->string("org_meeting_location");

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
