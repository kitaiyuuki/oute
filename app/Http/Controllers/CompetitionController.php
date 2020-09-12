<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competition;
use Illuminate\Support\Facades\Auth;

class CompetitionController extends Controller
{
    public function index(Request $request) {

        $search = $request->query('search', '');
        
        return Competition::with('favorite')
            ->where('name', 'like', '%' . $search . '%')
            ->withCount('favorite')
            ->orderByRaw('favorite_count desc, created_at desc')
            ->paginate();
    }

    public function show($id) {
        
        $competition = Competition::with('favorite')->find($id);

        if (!$competition) {
            abort(404);
        }

        return $competition ?? abort(404);
    }

    public function favorite($id) {

        $competition = Competition::with('favorite')->find($id);

        if (!$competition) {
            abort(404);
        }

        $competition->favorite()->detach(Auth::user()->id);
        $competition->favorite()->attach(Auth::user()->id);

        return response(['competition_id' => $id], 201);
    }

    public function notFavorite($id) {

        $competition = Competition::with('favorite')->find($id);

        if (!$competition) {
            abort(404);
        }

        $competition->favorite()->detach(Auth::user()->id);

        return ['competition_id' => $id];
    }

    public function favoriteList() {
        return Auth::user()->competitions()
            ->withPivot(['created_at'])
            ->orderBy('pivot_created_at', 'desc')
            ->paginate();
    }
}
