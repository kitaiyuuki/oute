<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Competition extends Model
{
    protected $fillable = ['name'];

    protected $visible = ['id', 'name', 'favorite_count', 'is_favorite'];

    protected $appends = ['favorite_count', 'is_favorite'];

    protected $perPage = 10;

    public function news() {
        return $this->belongsToMany('App\News', 'news_competitions');
    }

    public function favorite() {
        return $this->belongsToMany('App\User', 'favorite_competitions')->withTimestamps();
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
