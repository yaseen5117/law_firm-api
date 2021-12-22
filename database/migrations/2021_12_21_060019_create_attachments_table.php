<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();             
            $table->string('title')->nullable();
            $table->string('file_name')->nullable();
            $table->text('comment')->nullable();
            $table->string('mime_type')->nullable();
            $table->integer('attachmentable_id')->nullable();
            $table->string('attachmentable_type')->nullable();                          
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
