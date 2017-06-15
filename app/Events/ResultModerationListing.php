<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ResultModerationListing extends Event
{
    use SerializesModels;

    protected $id;
    protected $alasan;
    protected $status;
    protected $email;
    protected $nama;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id , $alasan ,$status ,$email , $nama)
    {
        $this->id = $id;
        $this->alasan = $alasan;
        $this->status = $status;
        $this->email = $email;
        $this->nama = $nama;
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
    public function getAlasan()
    {
        return $this->alasan;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
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
