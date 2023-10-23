<?php

namespace App\Http\Controllers;

use App\Models\ArtistsLike;
use App\Models\FavoriteArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ArtistsLikeController extends Controller
{
    public function getAllLikesFromArtistName($artistName)
    {
        $likeCount = DB::table('artists_likes')
            ->where('artist_name', $artistName)
            ->count();

        return $likeCount;
    }

    public function getLikedArtistsByUserId($userId)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->getAuthIdentifier() == $userId) {
            return $user->likedArtists->pluck('artist_name')->toArray();
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }

    public function store($artistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        $likedArtist = new ArtistsLike(['artist_name' => $artistName]);
        $user->likedArtists()->save($likedArtist);
        return Redirect::to('/');
    }

    public function destroy($userId, $artistName)
    {
        $user = Auth::user(); // Utilisateur connecté
        if ($user->id == $userId) {
            $likedArtist = ArtistsLike::find($artistName);
            if ($likedArtist) {
                $likedArtist->delete();
                return Redirect::to('/');
            } else {
                return response()->json(['message' => 'Artiste préféré non trouvé.'], 404);
            }
        } else {
            return response()->json(['message' => 'Accès non autorisé.'], 403);
        }
    }
}
