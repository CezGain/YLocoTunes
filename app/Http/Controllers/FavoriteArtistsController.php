<?php

namespace App\Http\Controllers;

use App\Models\FavoriteArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class FavoriteArtistsController extends Controller
{
    public function getFavArtistsByUserId($userId)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->getAuthIdentifier() == $userId) {
            $favoriteArtists = $user->favoriteArtists->pluck('artist_name')->toArray();
            return $favoriteArtists;
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }

    public function store($artistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        $favoriteArtist = new FavoriteArtist(['artist_name' => $artistName]);
        $user->favoriteArtists()->save($favoriteArtist);
        return Redirect::to('/');
    }

    public function destroy($userId, $favoriteArtistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->id == $userId) {
            $favoriteArtist = FavoriteArtist::find($favoriteArtistName);
            if ($favoriteArtist) {
                $favoriteArtist->delete();
                return Redirect::to('/');
            } else {
                return response()->json(['message' => 'Artiste préféré non trouvé.'], 404);
            }
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }
}
