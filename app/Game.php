<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_date','played','invitation','minimal_players','reviews'
    ];

    /**
     * A game can have many invitations
     *
     * @return mixed
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
