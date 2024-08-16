<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\OrdersIntents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id) // afficher toutes les commandes effectuées par le client 
    {
        $orders = DB::table('orders')
        ->where('order_user_id', $user_id)
        ->paginate(15);

        if ($orders->isEmpty()) {
            return response()->json(['message' => 'Aucune commande trouvée'], 404);
        }else{
            return response()->json($orders);
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
    public function store(StoreOrdersRequest $request) //valider une intention de commande
    {
        $data = $request->validate([
            'order_intent_id' => 'required|exists:orders_intents,order_intent_id',
            'order_payment' => 'required|string|max:100',
            'order_info' => 'nullable|string',
        ]);

        $orderIntent = OrdersIntents::find($data['order_intent_id']);

        // Créer la commande à partir de l'intention de commande
        $order = Orders::create([
            'order_number' => Str::uuid(),
            'order_event_id' => $orderIntent->event_id,
            'order_price' => $orderIntent->order_intent_price,
            'order_type' => $orderIntent->order_intent_type,
            'order_payment' => $data['order_payment'],
            'order_info' => $data['order_info'],
        ]);
        
        // générer l'URL de téléchargement des tickets
        $url = url("/tickets/download/{$order->order_number}");

        return response()->json([
            'order' => $order,
            'download_url' => $url
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
