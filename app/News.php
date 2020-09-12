<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title'];

    protected $visible = ['id', 'title', 'date', 'players', 'competitions', 'comments', 'url'];

    protected $appends = ['date', 'url'];

    protected $perPage = 10;

    public function players() {
        return $this->belongsToMany('App\Player', 'news_players');
    }

    public function competitions() {
        return $this->belongsToMany('App\Competition', 'news_competitions');
    }

    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
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

    public function getUrlAttribute() {
        return Storage::disk('public')->url('news/' . $this->id . '.jpg');
    }

}
