<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function index(Request $request) {

        $search = $request->query('search', '');

        return Player::with('favorite')
            ->where('name', 'like', '%' . $search . '%')
            ->withCount('favorite')
            ->orderByRaw('favorite_count desc, created_at desc')
            ->paginate();
    }

    public function show($id) {

        $player = Player::with('favorite')->find($id);

        if (!$player) {
            abort(404);
        }

        return $player ?? abort(404);
    }

    public function favorite(string $id) {

        $player = Player::with('favorite')->find($id);

        if (!$player) {
            abort(404);
        }

        $player->favorite()->detach(Auth::user()->id);
        $player->favorite()->attach(Auth::user()->id);

        return response(['player_id' => $id], 201);

    }

    public function notFavorite($id) {
        
        $player = Player::with('favorite')->find($id);

        if (!$player) {
            abort(404);
        }

        $player->favorite()->detach(Auth::user()->id);

        return ['player_id' => $id];
    }

    public function favoriteList() {

        return Auth::user()->players()
        ->withPivot(['created_at'])
        ->orderBy('pivot_created_at', 'desc')
        ->paginate();
    }
}
