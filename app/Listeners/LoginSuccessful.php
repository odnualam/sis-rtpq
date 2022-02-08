<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Event\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->subject = 'login';
        $event->description = 'Login Berhasil';

        activity($event->subject)
            ->by($event->user)
            ->log($event->description);
    }
}
