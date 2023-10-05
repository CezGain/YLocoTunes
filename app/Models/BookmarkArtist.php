<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookmarkArtist extends Model
{
    // Define the table name if it can't be guessed from the model name
    protected $table = 'bookmarks_artists';

    // Define the primary key if it's not 'id'
    // protected $primaryKey = 'id';

    // Define fillable attributes for mass assignment
    protected $fillable = ['artist_id', 'user_id'];

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // You can also define the relationship to the Artist model,
    // assuming you have an Artist model:
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
