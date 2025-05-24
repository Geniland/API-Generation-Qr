<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;

class EmergencyContactController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($request->user()->emergencyContacts);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'relation' => 'nullable|string|max:100',
        ]);

        $contact = $request->user()->emergencyContacts()->create($data);

        return response()->json($contact, 201);
    }

    public function destroy(EmergencyContact $contact)
    {
        // Vérifie simplement que le contact appartient à l'utilisateur connecté
        if ($contact->user_id !== auth()->id()) {
            return response()->json(['message' => 'Non autorisé.'], 403);
        }

        $contact->delete();

        return response()->json(['message' => 'Contact supprimé.']);
    }

}
