<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['delete_at'];

    protected $visible = [
        'name', 'email', 'player_count', 'competition_count'
    ];

    protected $appends = [
        'player_count', 'competition_count'
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function players() {
        return $this->belongsToMany('App\Player', 'favorite_players');
    }

    public function competitions() {
        return $this->belongsToMany('App\Competition', 'favorite_competitions');
    }

    public function histories() {
        return $this->belongsToMany('App\News', 'histories');
    }

    public function getPlayerCountAttribute() {
        return $this->players->count();
    }

    public function getCompetitionCountAttribute() {
        return $this->competitions->count();
    }
}
