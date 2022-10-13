<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVideoMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video_meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->text('host_meeting_iframe')->nullable();
            $table->string('meeting_id_public',1000)->nullable();
            $table->timestamp("meeting_expiration");
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
        Schema::dropIfExists('user_video_meetings');
    }
}
