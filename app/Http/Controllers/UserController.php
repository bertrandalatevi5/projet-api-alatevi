<?php

namespace App\Http\Controllers;

use App\Mail\ContactUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //soumission du formulaire de demande d'accès a l'api par l'utilisateur
    public function store(Request $request) 
    {
        $request->validate([
            'prenom' => 'required|string|max:50',
            'nom' => 'required|string|max:50',
            'entreprise' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'ville' => 'required|string|max:50',
            'adresse' => 'required|string|max:200',
        ], [
            //personnaliser les messages
            'prenom.required' => "Ce champ prenom est requis",
            'nom.required' => "Ce champ nom est requis",
            'entreprise.required' => "Ce champ entreprise est requis",
            'email.required' => "Ce champ email est requis",
            'ville.required' => "Ce champ ville est requis",
            'adresse.required' => "Ce champ adresse est requis",
        ]);

        
        try {
            $form_data = array(
                'prenom' =>  $request->prenom,
                'nom' =>  $request->nom,
                'entreprise' =>  $request->entreprise,
                'email' =>  $request->email,
                'ville' =>  $request->ville,
                'adresse' =>  $request->adresse,
                'api_token' => Str::random(6),
            );

            $user = User::create($form_data);

            // Envoyer l'email avec les identifiants d'accès a l'API
            Mail::to($user->email)->send(new ContactUser($user));
            return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès. Veuillez vérifier votre email pour les identifiants d\'API.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }  
        
    }
}
