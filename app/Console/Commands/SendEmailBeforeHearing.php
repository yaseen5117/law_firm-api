<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\CronjobController;
class SendEmailBeforeHearing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send-email-before-hearing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send an email 1 day before hearning at 12 pm.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cronjobController = new CronjobController;
        $cronjobController->send_email_before_hearing();
        return true;
    }
}
