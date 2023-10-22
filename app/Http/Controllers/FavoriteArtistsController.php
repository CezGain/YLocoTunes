<?php

namespace App\Http\Controllers;

use App\Models\FavoriteArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FavoriteArtistsController extends Controller
{
    public function show($userId)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->getAuthIdentifier() == $userId) {
            $favoriteArtists = $user->favoriteArtists;
            return json_encode($favoriteArtists);
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }

    public function store($artistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        $favoriteArtist = new FavoriteArtist(['artist_name' => $artistName]);
        $user->favoriteArtists()->save($favoriteArtist);
        return response()->json(['message' => 'Artiste préféré ajouté avec succès.']);
    }

    public function destroy($userId, $favoriteArtistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->id == $userId) {
            $favoriteArtist = FavoriteArtist::find($favoriteArtistName);
            if ($favoriteArtist) {
                $favoriteArtist->delete();
                return response()->json(['message' => 'Artiste préféré supprimé avec succès.']);
            } else {
                return response()->json(['message' => 'Artiste préféré non trouvé.'], 404);
            }
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }
}
