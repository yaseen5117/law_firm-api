<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Api\AttachmentController;
class JobConvertPdfToImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $attachmentable_type;
    protected $attachmentable_id;
    protected $file_path;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file_path,$attachmentable_id,$attachmentable_type)
    {
        $this->file_path = $file_path;
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
        $objAttachmentController = new AttachmentController;
        $objAttachmentController->convertPdftoimages($this->file_path,$this->attachmentable_id,$this->attachmentable_type);
    }
}
