<?php

namespace App\Listeners;

use App\Events\ResultModerationBerita;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendResultModerationBerita
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
     * @param  ResultModerationBerita  $event
     * @return void
     */
    public function handle(ResultModerationBerita $event)
    {
        $email = $event->getEmail();
        if($event->getAlasan() == "")
        {
            $data = [
                'slug' => $event->getSlug(),
                'nama' => $event->getName()
            ];

            Mail::send(['html' => 'mail.acceptberita'], ['data' => $data], function ($message) use ($email) {
                $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
                $message->to($email)->subject('Berita Telah Direview Admin');
            });

        }
        else{
            $data = [
                'slug' => $event->getSlug(),
                'nama' => $event->getName(),
                'alasan' => $event->getAlasan()
            ];
            Mail::send(['html' => 'mail.rejectberita'], ['data' => $data], function ($message) use ($email) {
                $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
                $message->to($email)->subject('Notifikasi Iklan');
            });
        }
    }
}
