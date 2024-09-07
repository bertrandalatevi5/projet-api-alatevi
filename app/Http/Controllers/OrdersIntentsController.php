<?php

namespace App\Http\Controllers;

use App\Models\OrdersIntents;
use App\Http\Requests\StoreOrdersIntentsRequest;
use App\Http\Requests\UpdateOrdersIntentsRequest;
use OpenApi\Attributes as OA;

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
    #[OA\Post(
        path: '/api/orders-intents',
        description: 'Créer une intention de commande ',
        tags: ["Orders-Intents"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "order_intent_price", type: "integer"),
                    new OA\Property(property: "order_intent_type", type: "string"),
                    new OA\Property(property: "user_email", type: "email"),
                    new OA\Property(property: "user_phone", type: "string"),
                    new OA\Property(property: "expiration_date", type: "date"),
                ]
            ),
        ),
        responses: [
            new OA\Response(response: 201, description: 'Votre commande a été enregistrée!'),
            new OA\Response(response: 500, description: 'Votre commande n\'a pas été enregistrée. Veuillez réessayer.'),
        ]
    )]
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
                'success' => true,
                'message' => 'Votre commande a été enregistrée!',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Votre commande n\'a pas été enregistrée. Veuillez réessayer.',
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
