<?php

namespace App\Listeners;

use App\Events\UserRegister;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        $name = $event->getName();
        $encodedEmail = base64_encode($email);
        $data = [
            'token'=>$encodedEmail,
            'name'=>$name
        ];
        Mail::send(['html'=>'mail.newuserregister'],['data'=>$data], function ($message) use ($email){
            $message->from(env('MAIL_FROM'),'Jual Mobil');
            $message->to($email)->subject('Confirmation Email');
        });
    }
}
