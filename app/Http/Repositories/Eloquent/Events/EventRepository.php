<?php

namespace App\Http\Repositories\Eloquent\Events;

use App\Http\Repositories\Policies\EventCreateInterface;
use App\Http\Repositories\Policies\EventFetchInterface;
use App\Models\Event;

class EventRepository implements EventCreateInterface, EventFetchInterface
{
    protected $event;

    public function __construct()
    {
        $this->event = new Event();
    }

    public function all()
    {
        return $this->event->all();
    }

    public function create($data)
    {
        return $this->event->create($data);
    }
}
