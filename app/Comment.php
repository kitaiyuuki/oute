<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = ['user_id', 'news_id', 'content'];

    protected $visible = [
        'id', 'author', 'content', 'date', 'is_mine', 'favorite_count', 'is_favorite'
    ];

    protected $appends = [
        'date', 'is_mine', 'favorite_count', 'is_favorite'
    ];

    public function author() {
        return $this->belongsTo('App\User', 'user_id', 'id', 'users');
    }

    public function favorite() {
        return $this->belongsToMany('App\User', 'favorite_comments');
    }

    public function getDateAttribute()
    {
        $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);

        if (Carbon::now()->diffInDays($createdAt) < 1) {
            if (Carbon::now()->diffInHours($createdAt) < 1) {
                return Carbon::now()->diffInMinutes($createdAt) . '分前';
            } else {
                return Carbon::now()->diffInHours($createdAt) . '時間前';
            }
        } else if (Carbon::now()->diffInWeeks($createdAt) < 1) {
            return Carbon::now()->diffInDays($createdAt) . '日前';
        } else {
            return $createdAt->format('Y/m/d');
        }
    }

    public function getIsMineAttribute() {

        if(Auth::guest()) {
            return false;
        }

        $bool = $this->author->id === Auth::user()->id;

        return $bool;
    }

    public function getFavoriteCountAttribute() {
        return $this->favorite->count();
    }

    public function getIsFavoriteAttribute() {

        if (Auth::guest()) {
            return false;
        }

        return $this->favorite->contains(function($user) {
            return $user->id === Auth::user()->id;
        });
    }
}
