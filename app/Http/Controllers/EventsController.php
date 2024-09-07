<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use OpenApi\Attributes as OA;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: '/api/events',
        description: 'Récupérer la liste des événements en cours ',
        tags: ["Events"],
        responses: [
            new OA\Response(response: 200, description: 'Evènement trouvé.'),
            new OA\Response(response: 404, description: 'Pas d/évènement trouvé dans cette ville')
        ]
    )]
    public function index() //la liste des événements en cours
    {
        $events = DB::table('events')
            ->where('event_status', '=', 'upcoming')
            ->orderBy('event_date')
            ->paginate(15);

            if ($events->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pas d/évènement trouvé',
                ], 404);
            }else{
                return response()->json([
                    'success' => true,
                    'data' => $events,
                    'message' => 'Evènement trouvé',
                ], 200);
            }
    }

    #[OA\Get(
        path: '/api/events/search/{event_city}',
        description: 'Rechercher un évènement dans une ville spécifique',
        tags: ["Events"],
        parameters: [
            new OA\QueryParameter(name: 'event_city', in: 'query', required: false, description: 'Liste d\'évènement dans cette ville'),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Evènement trouvé.'),
            new OA\Response(response: 404, description: 'Pas d/évènement trouvé dans cette ville')
        ]
    )]
    public function search($event_city)
    {
        $events = Events::where('event_city', 'like', '%' . $event_city . '%')->paginate(10);
        
        if ($events->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Pas d/évènement trouvé dans cette ville'
            ], 404);
        }else{
            return response()->json([
                'success' => true,
                'data' => $events,
                'message' => 'Evènement trouvé',
            ], 200);
        }
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
