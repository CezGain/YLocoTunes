<?php

namespace App\Http\Controllers;

use App\BookmarkArtist;
use Illuminate\Http\Request;

class BookmarksArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $bookmarks = BookmarkArtist::where('user_id', $user->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => $bookmarks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $existingBookmark = BookmarkArtist::where('user_id', $user->id)
            ->where('item_id', $request->item_id)
            ->first();

        if ($existingBookmark) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item already bookmarked!'
            ]);
        }

        $bookmark = new BookmarkArtist;
        $bookmark->user_id = $user->id;
        $bookmark->item_id = $request->item_id;
        $bookmark->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Item bookmarked successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($artistId, Request $request)
    {
        $user = $request->user();

        $bookmark = BookmarkArtist::where('user_id', $user->id)
            ->where('artist_id', $artistId)
            ->first();

        if (!$bookmark) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item non existant!'
            ]);
        }

        $bookmark->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item deleted!'
        ]);
    }
}
