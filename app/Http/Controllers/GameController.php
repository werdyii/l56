<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::latest('game_date')
        ->filter( request( ['year','month'] ) )
        ->simplePaginate(10);

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        date_default_timezone_set('Europe/Bratislava');
        $game = new Game();
        $game->game_date = date('d.m.Y H:i');
        $game->minimal_players = 8;
        $game->send_invitations = 1;
        $game->invitation = "Ahoj športovci,\npozývam Vás na hokej.";

        return view('games.create', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_date' => 'required|date_format:"d.m.Y"',
            'game_time' => 'required|date_format:"H:i"',
            'minimal_players' => 'required|integer|min:2',
            'invitation' => 'required|string|min:4'
        ]);

        $game = Game::create([
            'game_date' => request('game_date')." ".request('game_time'),
            'minimal_players' => request('minimal_players'),
            'invitation' => request('invitation')
        ]);

        return redirect()->route('games.show', $game )->with('status', 'Game planed succesed, OK !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'game_date' => 'required|date_format:"d.m.Y"',
            'game_time' => 'required|date_format:"H:i"',
            'minimal_players' => 'required|integer|min:2',
            'invitation' => 'required|string|min:4'
        ]);

        $game->update([
            'game_date' => request('game_date')." ".request('game_time'),
            'minimal_players' => request('minimal_players'),
            'invitation' => request('invitation')
        ]);

        return redirect()->route('games.show', $game )->with('status', 'Game update succesed, OK !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        return "Destroy no aplay :( !!!";
    }
}
