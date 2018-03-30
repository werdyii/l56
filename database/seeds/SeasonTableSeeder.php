<?php
use App\Season;
use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$seasons = [
			['2012/2013','2012-09-01','2013-06-30'],
			['2013/2014','2013-09-01','2014-06-30'],
			['2014/2015','2014-09-01','2015-06-30'],
			['2015/2016','2015-08-28','2016-06-30'],
			['2016/2017','2016-09-01','2017-06-30'],
			['2017/2018','2017-09-01','2018-06-30']
    	];

    	foreach ($seasons as $key => $value) {
	         Season::create([
	         	'name' => $value[0],
	         	'start_date' => $value[1],
	         	'end_date' => $value[2]
	         ]);
    	}
    }
}
