<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyIdColToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attachments', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('case_laws', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('contact_requests', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('contracts_and_agreements', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('contract_categories', function (Blueprint $table) {

            $table->unsignedInteger('company_id')->nullable()->after('id');
        });

        Schema::table('extra_documents', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('general_case_laws', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('invoice_expenses', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('invoice_metas', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('invoice_statuses', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('invoice_templates', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('petition_hearings', function (Blueprint $table) {
            $table->unsignedInteger('company_id')->nullable()->after('id');
        });
        Schema::table('settings', function (Blueprint $table) {
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
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('petition_hearings', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('invoice_templates', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('invoice_statuses', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('invoice_metas', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('invoice_expenses', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('general_case_laws', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('extra_documents', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('contract_categories', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('contracts_and_agreements', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('attachments', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('case_laws', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
        Schema::table('contact_requests', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }
}
