<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Resources\EventResourse;
use App\Models\Event;
use App\Services\V1\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected EventService $event;

    /**
     * Create a new controller instance
     */
    public function __construct(EventService $event)
    {
        return $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCreateRequest $request)
    {
        return response()->json(new EventResourse($this->event->create($request->all())));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
