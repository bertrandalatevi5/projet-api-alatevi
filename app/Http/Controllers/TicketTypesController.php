<?php

namespace App\Http\Controllers;

use App\Models\TicketTypes;
use App\Http\Requests\StoreTicketTypesRequest;
use App\Http\Requests\UpdateTicketTypesRequest;
use Illuminate\Support\Facades\DB;

class TicketTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event_id) // lister les types de tickets disponibles pour un événement donné
    {
        $ticketTypes = DB::table('ticket_types')
            ->where('ticket_type_event_id', $event_id)
            ->get();

            return response()->json($ticketTypes);
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
