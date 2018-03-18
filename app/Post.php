<?php

namespace App;
use App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'content', 'slug'];

	/**
	 * @var array
	 */
	protected $appends = ['teaser', 'datetime'];

	/**
	 * A post belongs to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Create slug from title before storing to DB
	 *
	 * @param $value
	 */
	public function setTitleAttribute($value)
	{
	 	$this->attributes['title'] = $value;
	 	$this->attributes['slug']  = str_slug($value);
	}

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}

	/**
	 * @param  $value
	 * @return bool|string
	 */
	public function getCreatedAtAttribute( $value )
	{
		switch ( App::getLocale() )
		{
			case 'sk' :
				return date('\d\ň\a j. m. Y \o G:i', strtotime( $value ));
				break;

			default :
				return date('j M Y, G:i', strtotime( $value ));
		}
	}

	/**
	 * @return bool|string
	 */
	public function getDatetimeAttribute()
	{
		return date('Y-m-d', strtotime($this->created_at));
	}


	/**
	 * @return string
	 */
	public function getTeaserAttribute()
	{
		return word_limiter( $this->content, 60 );
	}


	/**
	 * @return mixed|string
	 */
	public function getRichTextAttribute()
	{
		return add_paragraphs( filter_url( e($this->content) ) );
	}

	public function scopeFilter($query, $filters)
	{
		if( array_has( $filters, 'month' ) ){
			$query->whereMonth('created_at', $filters['month'] );
		}
		if( array_has( $filters, 'year' ) ){
			$query->whereYear('created_at', $filters['year'] );
		}
	}

	static function archives()
	{
		return static::selectRaw(' year(created_at) as year,
            month(created_at) as month,
            monthname(created_at) as monthname,
            count(*) published'
        )
        ->groupBy('year','month','monthname')
        ->orderByRaw(' min(created_at) desc ')
        ->get();
	}
}
