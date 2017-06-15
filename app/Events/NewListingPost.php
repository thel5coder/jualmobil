<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewListingPost extends Event
{
    use SerializesModels;

    protected $id;
    protected $name;
    protected $email;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($result , $name, $email)
    {
        $this->id = $result;
        $this->name = $name;
        $this->email = $email;
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
    public function getId()
    {
        return $this->id;
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


}
