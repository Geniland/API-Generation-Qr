<?php
namespace App\Http\Controllers;

use App\Models\User;

class EmergencyController extends Controller
{
    public function show($uuid)
    {
        $user = User::where('uuid', $uuid)->with('emergencyContacts')->firstOrFail();

        return response()->json([
            'user' => $user->name,
            'contacts' => $user->emergencyContacts,
        ]);
    }
}
