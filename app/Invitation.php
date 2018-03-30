<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token','user_id','game_id','sent_at','replpy_at','replpy','comment','expire_at'
    ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'token';
	}

	/**
	 * A post belongs to a game
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id')->withTrashed();
    }

	/**
	 * A post belongs to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
}
