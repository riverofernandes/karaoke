<?php

namespace App\Services\V1;

use App\Models\Event;
use Illuminate\Support\Collection;

class EventService
{
    /**
     * List all categories
     */
    public function list(): Collection
    {
        return Event::all();
    }

    public function create()
    {
        return Event::all();
    }
}
