<?php

namespace App\Http\Controllers;

use App\Season;
use App\User;
//use Illuminate\Http\Request;
use App\Http\Requests\SeasonRequest;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::orderBy('start_date','desc')->get();
        return view('seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $season = new Season;
        $players = User::all();
        return view('seasons.create', compact('season','players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SeasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeasonRequest $request)
    {
        $season = Season::create( $request->only(['name','start_date','end_date']) );

        $this->syncPivotUser( $season, $request->blue, 'modry' );

        $this->syncPivotUser( $season, $request->white, 'biely' );

        return view('seasons.show', compact('season'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        return view('seasons.show', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        $players = User::all();

        return view('seasons.edit', compact('season','players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(SeasonRequest $request, Season $season)
    {
        $season->update( $request->only(['name','start_date','end_date']) );

        $this->syncPivotUser( $season, $request->blue, 'modry' );

        $this->syncPivotUser( $season, $request->white, 'biely' );

        return view('seasons.show', compact('season'))->with('status', 'Updated!');
    }

    /**
     * Show delete item a submit deleting.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function delete(Season $season)
    {
        return view('seasons.delete', compact('season'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
      $season->delete();
      return redirect('season')->with('status', 'Deleted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @param   $players
     * @param   $team
     *
     */
    private function syncPivotUser(Season $season, $players, $team )
    {
        $ids = array_map('trim',explode(",", $players));

        $season->users()->wherePivot('team', $team)->detach();
        foreach ($ids as $key => $value){
            $season->users()->attach( $value, ['team' => $team ] );
        }
    }

}
