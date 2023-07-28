<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColReqDocsUploadedToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            //first delete required_documents col from users table
            if (Schema::hasColumn('users', 'documents_required')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropColumn('documents_required');
                });
            }

            //Now add new col req_docs_uploaded to users table
            $table->boolean('req_docs_uploaded')->after('approved_by')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('req_docs_uploaded');
        });
    }
}
