<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //la liste des événements en cours
    {
        $events = DB::table('events')
            ->where('event_status', '=', 'upcoming')
            ->orderBy('event_date')
            ->paginate(15);

            return response()->json($events);
    }

    public function search($event_city)
    {
        $events = Events::where('event_city', 'like', '%' . $event_city . '%')->paginate(10);

        if ($events->isEmpty()) {
            return response()->json(['message' => 'Pas d/évènement trouvé dans cette ville'], 404);
        }

        return response()->json($events);
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
    public function store(StoreEventsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        //
    }
}
