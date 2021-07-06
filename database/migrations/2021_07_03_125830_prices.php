<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts');
            $table->decimal('facebook_timeline_photo', 8,2)->nullable();
            $table->decimal('facebook_timeline_video', 8,2)->nullable();
            $table->decimal('facebook_timeline_photo_review', 8,2)->nullable();
            $table->decimal('facebook_timeline_video_review', 8,2)->nullable();
            $table->decimal('facebook_day_photo', 8,2)->nullable();
            $table->decimal('facebook_day_video', 8,2)->nullable();
            $table->decimal('facebook_include_photo', 8,2)->nullable();
            $table->decimal('facebook_include_video', 8,2)->nullable();
            $table->decimal('inst_timeline_photo', 8,2)->nullable();
            $table->decimal('inst_timeline_video', 8,2)->nullable();
            $table->decimal('inst_timeline_photo_review', 8,2)->nullable();
            $table->decimal('inst_timeline_video_review', 8,2)->nullable();
            $table->decimal('inst_story_photo', 8,2)->nullable();
            $table->decimal('inst_story_video', 8,2)->nullable();
            $table->decimal('inst_include_photo', 8,2)->nullable();
            $table->decimal('inst_include_video', 8,2)->nullable();
            $table->decimal('youtube_dedicated', 8,2)->nullable();
            $table->decimal('youtube_dedicated_review', 8,2)->nullable();
            $table->decimal('youtube_sponsor', 8,2)->nullable();
            $table->decimal('youtube_description_sponsor', 8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
