<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteArtist extends Model
{
    protected $fillable = ['artist_name'];
    protected $table = 'favorite_artists';

    public static function find($favoriteArtistName)
    {
        return self::where('artist_name', $favoriteArtistName)->first();
    }

    /**
     * Rechercher un artiste préféré par son nom.
     *
     * @param string $favoriteArtistName
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
