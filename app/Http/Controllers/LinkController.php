<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $links_last = Link::OrderByDesc('created_at')->take(20)->get();
      $links_top  = Link::OrderByDesc('used')->take(20)->get();
      return view('links.index', compact('links_last','links_top'));
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
        'link' => 'bail|required|unique:links,url|max:255'
      ]);

      do {
        $newHash = Str::random(6);
      } while( Link::where('hash','=',$newHash) ->count() > 0);

      $link = Link::create([
        'url'   => request('link'),
        'hash'  => $newHash,
        'used'  => 0
      ]);
      return redirect('links')->with('status', 'New short link created!');
    }

    /**
     *
     * @param  \App\Link  $link
     * @return redirect url
     */
    public function processHash(Link $link)
    {
        $link->used++;
        $link->update();
        return redirect()->away( $link->url );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect('links')->with('status', 'Link Deleted !!!');
    }
}
