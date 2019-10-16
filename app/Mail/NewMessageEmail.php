<?php

namespace App\Mail;

use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailMessage;

    /**
     * Create a new message instance.
     *
     * @param Message $emailMessage
     */
    public function __construct(Message $emailMessage)
    {
         $this->emailMessage = $emailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.messages.mail', ['emailMessage' => $this->emailMessage]);
    }
}
