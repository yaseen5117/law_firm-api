<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeOfUrlColumnInLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('links', 'url'))
        {
            Schema::table('links', function (Blueprint $table) {
                $table->dropColumn('url');                 
            });                
        }    
        Schema::table('links', function (Blueprint $table) {            
            $table->text('url')->after('description')->nullable();
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
