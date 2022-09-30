<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Attachment;
use App\Models\CaseLaw;
use App\Models\ExtraDocument;
use App\Models\Invoice;
use App\Models\Judgement;
use App\Models\OralArgument;
use App\Models\Petition;
use App\Models\Setting;
use App\Models\PetitionReply;
use App\Models\PetitonOrderSheet;
use App\Models\PetitionIndex;
use App\Models\PetitionNaqalForm;
use App\Models\PetitionSynopsis;
use App\Models\PetitionTalbana;
use App\Services\EmailService;


class SendDocumentUploadEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $attachmentable_type;
    protected $attachmentable_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($attachmentable_type, $attachmentable_id)
    {
        $this->attachmentable_id = $attachmentable_id;
        $this->attachmentable_type = $attachmentable_type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        info("SendDocumentUploadEmail queue job start");
        $attachmentable_id = $this->attachmentable_id;
        $attachmentable_type = $this->attachmentable_type;
        switch ($attachmentable_type) {
            case 'App\Models\PetitonOrderSheet':
                $entity_title = "Order Sheet";
                $petition_ordersheet = PetitonOrderSheet::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_ordersheet->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\PetitionIndex':
                //id22
                $entity_title = "Petition Index";
                $petition_index = PetitionIndex::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_index->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\PetitionReply':
                $entity_title = "Replies";
                $petition_reply = PetitionReply::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_reply->petition_reply_parent->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\OralArgument':
                $entity_title = "Oral Argument";
                $petition_oral_argument = OralArgument::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_oral_argument->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\PetitionNaqalForm':
                $entity_title = "Naqal Form";
                $petition_naqal_form = PetitionNaqalForm::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_naqal_form->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\PetitionTalbana':
                $entity_title = "Talbana";
                $petition_talbana = PetitionTalbana::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_talbana->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\CaseLaw':
                $entity_title = "Case Laws";
                $petition_case_law = CaseLaw::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_case_law->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\ExtraDocument':
                $entity_title = "Extra Document";
                $petition_extra_document = ExtraDocument::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_extra_document->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\PetitionSynopsis':
                $entity_title = "Synopsis";
                $petition_judgement = PetitionSynopsis::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_judgement->petition()->withoutGlobalScopes()->first();
                break;

            case 'App\Models\Judgement':
                $entity_title = "Judgement";
                $petition_judgement = Judgement::withoutGlobalScopes()->find($attachmentable_id);
                $petition = $petition_judgement->petition()->withoutGlobalScopes()->first();
                break;

            default:
                $entity_title = "";
                break;
        }

        if (isset($petition) && !empty($entity_title)) {
            info("SendDocumentUploadEmail queue job sending email to petition id: $petition->id for entity_title $entity_title");
            $emailService = new EmailService;
            $emailService->send_document_uploading_email($petition, $entity_title);
        }
        info("SendDocumentUploadEmail queue job end");
    }
}
