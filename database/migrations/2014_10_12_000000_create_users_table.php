<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('dob')->nullable();            
            $table->bigInteger('region_id')->nullable();
            $table->bigInteger('province_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('dog_name')->nullable();
            $table->boolean('sex')->nullable();
            //$table->boolean('female')->nullable();            
            $table->bigInteger('age_month')->nullable();
            $table->bigInteger('age_year')->nullable();
            $table->unsignedBigInteger('race_type_id')->nullable();
            $table->string('relation_race')->nullable();
            $table->boolean('pedigree')->nullable();
            $table->longText('particular_detail')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('profile_image')->nullable();
            $table->longText('owner_detail')->nullable();
            $table->longText('dog_detail')->nullable();
            $table->boolean('approval_status')->default(0)->nullable();
            $table->timestamp('email_verified_at')->nullable();            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
