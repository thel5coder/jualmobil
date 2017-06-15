<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewBeritaPost extends Event
{
    use SerializesModels;

    protected $slug,$email,$nama;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $nama,$slug)
    {
        //
        $this->slug = $slug;
        $this->email = $email;
        $this->nama = $email;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }


}
