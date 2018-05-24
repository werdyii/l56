<?php

namespace App;
use Carbon\Carbon;
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
	 * @var array
	 */
    protected $appends = ['date','time'];
        
    /**
     * A game can have many invitations
     *
     * @return mixed
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setGameDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['game_date'] = Carbon::createFromFormat('d.m.Y H:i',$input)->format('Y-m-d H:i:00');
        } else {
            $this->attributes['game_date'] = null;
        }
    }
    public function getDateAttribute()
    {
        return date('d.m.Y', strtotime( $this->game_date )); 
    }
    public function getTimeAttribute()
    {
        return date('H:i', strtotime( $this->game_date )); 
    }

    /**
     * @return mixed|string
     */
    public function getInvitationRichTextAttribute()
    {
        return add_paragraphs( filter_url( e($this->invitation) ) );
    }

    public function scopeFilter($query, $filters)
    {
        if( array_has( $filters, 'month' ) ){
            $query->whereMonth('game_date', $filters['month'] );
        }
        if( array_has( $filters, 'year' ) ){
            $query->whereYear('game_date', $filters['year'] );
        }
    }

    static function archives()
    {
        return static::selectRaw(' year(game_date) as year,
            month(game_date) as month,
            monthname(game_date) as monthname,
            count(*) published'
        )
        ->groupBy('year','month','monthname')
        ->orderByRaw(' min(game_date) desc ')
        ->get();
    }
}
