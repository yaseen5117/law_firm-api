<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdColToAllTablesLeft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('judgements', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('links', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('opinions', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('oral_arguments', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_clients', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_documents', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_index_pages', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_indices', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_judges', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_lawyers', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_module_types', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_naqal_forms', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_opponents', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_petitioners', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_replies', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_reply_parents', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_statuses', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_synopses', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_talbanas', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_types', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_type_courts', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petiton_order_sheets', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('sample_pleadings', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('settings_meta', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings_meta', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('sample_pleadings', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petiton_order_sheets', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_type_courts', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_types', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_talbanas', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_synopses', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_statuses', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_reply_parents', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_replies', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_petitioners', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_opponents', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_naqal_forms', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_module_types', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_lawyers', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_judges', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_indices', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_index_pages', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_documents', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_clients', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('oral_arguments', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('opinions', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('links', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('judgements', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }
}
