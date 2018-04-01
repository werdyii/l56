<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Game;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','start_date','end_date'];

    protected $dates = ['deleted_at'];

    /**
     * A season can have many users
     *
     * @return mixed
     */
    public function users()
    {
      return $this->belongsToMany('App\User')->withPivot('team')->withTimestamps();
    }

    /**
     * A season can have many users
     *
     * @return mixed
     */
    public function blue()
    {
      return $this->users()->wherePivot('team','modry');
    }

    /**
     * A season can have many users
     *
     * @return mixed
     */
    public function white()
    {
      return $this->users()->wherePivot('team','biely');
    }

    /**
     * A season can have many games
     *
     * @return mixed
     */
    public function games()
    {
    	$start_date = $this->attributes['start_date'];
    	$end_date = $this->attributes['end_date'];

    	$games = Game::whereBetween('game_date',[$start_date, $end_date])->get();

        return $games;
    }

}
