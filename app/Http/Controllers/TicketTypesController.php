<?php

namespace App\Http\Controllers;

use App\Models\TicketTypes;
use App\Http\Requests\StoreTicketTypesRequest;
use App\Http\Requests\UpdateTicketTypesRequest;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OA;

class TicketTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: '/api/events/{event_id}/ticket-types',
        description: 'Récupérer la liste des types de tickets disponibles pour un événement donné ',
        tags: ["Ticket-Types"],
        parameters: [
            new OA\PathParameter(name: 'eventId', description: 'ID de événement', required: true),
        ],
        responses: [
            new OA\Response(response: 200, description: 'ticket trouvée.'),
            new OA\Response(response: 404, description: 'ticket non trouvé')
        ]
    )]
    public function index($event_id) // lister les types de tickets disponibles pour un événement donné
    {
        $ticketTypes = DB::table('ticket_types')
            ->where('ticket_type_event_id', $event_id)
            ->get();

            if ($ticketTypes->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'ticket non trouvée',
                ], 404);
            }else{
                return response()->json([
                    'success' => true,
                    'data' => $ticketTypes,
                    'message' => 'ticket trouvé',
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
    public function store(StoreTicketTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketTypes $ticketTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TicketTypes $ticketTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketTypesRequest $request, TicketTypes $ticketTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketTypes $ticketTypes)
    {
        //
    }
}
