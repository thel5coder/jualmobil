<?php

namespace App\Listeners;

use App\Events\UserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserRegistered
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
     * @param  UserRegister  $event
     * @return void
     */
    public function handle(UserRegister $event)
    {
        $email = $event->getEmail();
        $nama = $event->getName();
        $encodedEmail = base64_encode($email);

        Mail::send(['html'=>'mail.newuserregister'],['token'=>$encodedEmail] ,['nama' => $nama], function ($message) use ($email){
            $message->from(env('MAIL_USERNAME'),'Jual Mobil');
            $message->to($email)->subject('Confirmation Email');
        });
    }
}
