<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Player;
use App\Competition;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {

        return News::orderBy('created_at', 'desc')->paginate();
    }

    public function attention() {

        return News::orderBy(DB::raw('watches / TIMESTAMPDIFF(hour, created_at, CURRENT_TIMESTAMP)'), 'desc')->paginate();
    }

    public function show($id) {

        $news = News::with('players', 'competitions', 'comments.author', 'comments.favorite')->find($id);

        if (!$news) {
            abort(404);
        }

        $news->watches += 1;

        $news->save();

        $user = Auth::user();

        if (Auth::user()) {
            $user = Auth::user()->load('histories');
            $user->histories()->detach($news->id);
            $user->histories()->attach($news->id);
        }

        return $news;
    }

    public function history() {

        return Auth::user()
            ->histories()
            ->withPivot(['created_at'])
            ->orderBy('pivot_created_at', 'desc')
            ->paginate();
    }

    public function player($playerId) {

        $player = Player::with('news')->find($playerId);

        if (!$player) {
            abort(404);
        }

        return $player->news()->orderBy('created_at', 'desc')->paginate();
    }

    public function competition($competitionId) {

        $competition = Competition::with('news')->find($competitionId);

        if (!$competition) {
            abort(404);
        }

        return $competition->news()->orderBy('created_at', 'desc')->paginate();
    }

    public function article($id) {

        return Storage::disk('public')->get('news/article/' . $id . '.html');
    }

    public function comment($id, CommentFormRequest $request) {

        $news = News::with('comments')->find($id);

        if (!$news) {
            abort(404);
        }

        $comment = new Comment();
        $comment->content = $request->get('comment');
        $comment->user_id = Auth::user()->id;
        $news->comments()->save($comment);

        $new_comment = Comment::with('author')->find($comment->id);

        return response($new_comment, 201);
    }

    public function commentDelete($commentId) {

        $comment = Comment::find($commentId);

        if (!$comment) {
            abort(404);
        }

        $comment->delete();

        return null;
    }

    public function commentFavorite($commentId) {

        $comment = Comment::find($commentId);

        if (!$comment) {
            abort(404);
        }

        $comment->favorite()->detach(Auth::user()->id);
        $comment->favorite()->attach(Auth::user()->id);

        return response(['comment_id' => $commentId], 201);
    }

    public function commentNotFavorite($commentId) {

        $comment = Comment::find($commentId);

        if (!$comment) {
            abort(404);
        }

        $comment->favorite()->detach(Auth::user()->id);

        return ['comment_id' => $commentId];
    }
}
