<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function showLoginForm()
    {
        // Si l'utilisateur est déjà connecté, rediriger vers le dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        
        return view('login');
    }

    /**
     * Traite la tentative de connexion
     */
    public function login(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Tenter de connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            // Régénérer la session pour la sécurité
            $request->session()->regenerate();
            
            // Rediriger vers le dashboard
            return redirect()->intended(route('dashboard'));
        }

        // Si la connexion échoue, retourner avec une erreur
        return back()->withErrors([
            'error' => __('messages.invalid_credentials')
        ])->withInput($request->only('username'));
    }

    /**
     * Déconnexion de l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}