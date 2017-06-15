<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ResultModerationBerita extends Event
{
    use SerializesModels;
    protected $slug,$name,$email,$alasan;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lug , $name ,$email , $alasan)
    {
        $this->slug = $lug;
        $this->name = $name;
        $this->email= $email;
        $this->alasan = $alasan;
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
    public function getName()
    {
        return $this->name;
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
    public function getAlasan()
    {
        return $this->alasan;
    }



}
