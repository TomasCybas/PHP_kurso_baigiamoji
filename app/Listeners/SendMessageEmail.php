<?php

namespace App\Listeners;

use App\Events\NewMessage;
use App\Mail\NewMessageEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  NewMessage  $event
     * @return void
     */
    public function handle(NewMessage $event)
    {
        $students = $event->message->group->students;
        \Mail::to($students)->send(new NewMessageEmail($event->message));
    }
}
