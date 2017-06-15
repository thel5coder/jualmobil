<?php

namespace App\Listeners;

use App\Events\NewBeritaPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class NewBeritaWasPosted
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
     * @param  NewBeritaPost  $event
     * @return void
     */
    public function handle(NewBeritaPost $event)
    {
        $email = $event->getEmail();
        $data = [
            'slug' => $event->getSlug(),
            'nama' => $event->getNama()
        ];
        Mail::send(['html' => 'mail.newberitapost'], ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_USERNAME'), 'Jual Mobil');
            $message->to($email)->subject('Berita Berhasil Diposting');
        });

        Mail::send(['html' => 'mail.newberitapostforadmin'], ['data' => $data], function ($message) use ($email) {
            $message->from(env('MAIL_NOTIFSIS'), 'Jual Mobil');
            $message->to(env('MAIL_USERNAME'))->subject('Notifikasi Berita Baru');
        });
    }
}
