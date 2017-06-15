<?php

namespace App\Listeners;

use App\Events\ResultModerationListing;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendResultModerationListing
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
     * @param  ResultModerationListing  $event
     * @return void
     */
    public function handle(ResultModerationListing $event)
    {
        $email = $event->getEmail();
        if($event->getAlasan() == "")
        {
            $data = [
              'id' => $event->getId(),
              'nama' => $event->getNama()
            ];

            Mail::send(['html' => 'mail.acceptiklan'], ['data' => $data], function ($message) use ($email) {
                $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
                $message->to($email)->subject('Iklan Telah Direview Admin');
            });

        }
        else{
            $data = [
                'id' => $event->getId(),
                'nama' => $event->getNama(),
                'alasan' => $event->getAlasan()
            ];
            Mail::send(['html' => 'mail.rejectiklan'], ['data' => $data], function ($message) use ($email) {
                $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
                $message->to($email)->subject('Notifikasi Iklan');
            });
        }
    }
}
