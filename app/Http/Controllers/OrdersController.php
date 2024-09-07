<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\OrdersIntents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use OpenApi\Attributes as OA;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: '/api/orders/{used_id}',
        description: 'Afficher toutes les commandes effectuées par le client  ',
        tags: ["Orders"],
        parameters: [
            new OA\PathParameter(name: 'userId', description: 'ID du client', required: true),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Evènement trouvé.'),
            new OA\Response(response: 404, description: 'Aucune commande trouvée')
        ]
    )]
    public function index($user_id) // afficher toutes les commandes effectuées par le client 
    {
        $orders = DB::table('orders')
        ->where('order_user_id', $user_id)
        ->paginate(15);

        if ($orders->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Aucune commande trouvée'
            ], 404);
        }else{
            return response()->json([
                'success' => true,
                'data' => $orders,
                'message' => 'Commande trouvé',
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
    #[OA\Post(
        path: '/api/orders',
        description: 'Valider une intention de commande ',
        tags: ["Orders"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "order_intent_id", type: "exists"),
                    new OA\Property(property: "order_payment", type: "string"),
                    new OA\Property(property: "order_info", type: "string"),
                ]
            ),
        ),
        responses: [
            new OA\Response(response: 201, description: 'Commande validé.'),
            new OA\Response(response: 404, description: 'Commande non validé.'),
        ]
    )]
    public function store(StoreOrdersRequest $request) //valider une intention de commande
    {
        try{
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
                'success' => true,
                'order' => $order,
                'message' => 'Commande validé.',
                'download_url' => $url
            ], 201);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Commande non validé.',
            ], 404);
        }
        
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
