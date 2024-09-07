<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "API-ALATEVI", 
    version: "0.1",
    description: "Documentation de l'API pour ALATEVI"
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Serveur de l\'API locale'
)]
class OpenApi
{
    // D'autres annotations ou méthodes peuvent être ajoutées ici
}
