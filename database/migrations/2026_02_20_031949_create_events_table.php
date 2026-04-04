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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->foreignId("event_organizer_id");
            $table->string("event_organizer"); // user 
            $table->string("event_organizer_email");
            $table->string("event_affiliation")->nullable(); // club || society || organization
            $table->json("tags")->nullable();
            $table->string("event_title");
            $table->longText("event_description");
            $table->date("event_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->foreignId("forum_id"); // forum that's linked to this event
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
