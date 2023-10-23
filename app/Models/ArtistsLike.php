<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistsLike extends Model
{
    protected $fillable = ['artist_name'];
    protected $table = 'artists_likes';
    public static function find($favoriteArtistName)
    {
        return self::where('artist_name', $favoriteArtistName)->first();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
