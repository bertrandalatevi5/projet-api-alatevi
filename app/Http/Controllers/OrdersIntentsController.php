<?php

namespace App\Http\Controllers;

use App\Models\OrdersIntents;
use App\Http\Requests\StoreOrdersIntentsRequest;
use App\Http\Requests\UpdateOrdersIntentsRequest;

class OrdersIntentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreOrdersIntentsRequest $request) //créer une intention de commande.
    {
        $data = $request->validate([
            'order_intent_price' => 'required|integer',
            'order_intent_type' => 'required|string|max:50',
            'user_email' => 'required|email',
            'user_phone' => 'required|string|max:20',
            'expiration_date' => 'required|date',
        ]);
        try {
            OrdersIntents::create($data);

            return response()->json([
                'success' => 'Votre commande a été enregistrée!'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'errors' => ['Une erreur est survenue. Veuillez réessayer.'],
                'exception' => $e->getMessage() // Retourner le message d'exception
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdersIntents $ordersIntents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdersIntents $ordersIntents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersIntentsRequest $request, OrdersIntents $ordersIntents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdersIntents $ordersIntents)
    {
        //
    }
}
