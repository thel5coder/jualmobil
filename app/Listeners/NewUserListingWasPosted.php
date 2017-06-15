<?php

namespace App\Listeners;

use App\Events\NewListingPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewUserListingWasPosted
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
     * @param  NewListingPost $event
     * @return void
     */
    public function handle(NewListingPost $event)
    {
        //
        $email = $event->getEmail();
        $data = [
            'id' => base64_encode($event->getId()),
            'nama' => $event->getName()
        ];

        Mail::send(['html' => 'mail.newlistingpost'], ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
            $message->to($email)->subject('Iklan Berhasil Diposting');
        });

        Mail::send(['html' => 'mail.newlistingpostforadmin'], ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_NOTIFSIS'), 'Jual Mobil');
            $message->to(env('MAIL_USERNAME'))->subject('Notifikasi Iklan Baru');
        });
    }
}
