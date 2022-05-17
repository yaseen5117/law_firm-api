<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'ghulamyaseenmalik206@gmail.com';
        $subject = 'This is a demo!';
        $name = 'Ghulam Yaseen';
        info("Sending EMail". __LINE__);
        return $this->view('emails.test')
                    ->from($address, $name) 
                    ->subject($subject)
                    ->with([ 'test_message' => $this->data['message'] ]);
    }
}
