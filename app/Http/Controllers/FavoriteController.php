<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->get();
        return view('favoritos', compact('favorites'));
    }

    public function store(Request $request)
    {
        $userId=1;
        
        Favorite::create([
            'user_id' => $userId,
            'movie_id' => $request->movie_id,
            'title' => $request->title,
            'poster' => $request->poster,
        ]);

        return redirect()->back()->with('success', 'Película añadida a favoritos');
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())->where('id', $id)->first();
        if ($favorite) {
            $favorite->delete();
        }
        return redirect()->back()->with('success', 'Película eliminada de favoritos');
    }
}
