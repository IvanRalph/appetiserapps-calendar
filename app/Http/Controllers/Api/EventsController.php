<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Policies\EventCreateInterface;
use App\Http\Repositories\Policies\EventFetchInterface;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param EventFetchInterface $event
     * @return void
     */
    public function index(EventFetchInterface $event)
    {
        return response(EventResource::collection($event->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest         $request
     * @param EventCreateInterface $event
     * @return void
     */
    public function store(EventRequest $request, EventCreateInterface $event)
    {
        $data = $request->validated();

        return response($event->create($data));
    }
}
