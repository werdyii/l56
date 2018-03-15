<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $farms = Farm::orderBy('name', 'asc')->paginate(9);
      return view('farms.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farms.create');
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
        'name'    => 'bail|required|unique:farms|max:255',
        'city'    => 'required',
        'website' => 'bail|required|unique:farms|max:255'
      ]);

      Farm::create($request->all());
      return redirect('farms')->with('status', 'New Farm Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        return view('farms.show', ['farm' => $farm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
      $markets = \App\Market::get()->pluck('id', 'name')->sortBy('name');
      return view('farms.edit', compact('farm', 'markets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
      $request->validate([
        'name'    => 'bail|required|max:255|unique:farms,name,'.$farm->id,
        'city'    => 'required',
        'website' => 'bail|required|max:255|unique:farms,website,'.$farm->id
      ]);

      $farm->update($request->all());
      $farm->markets()->sync($request->markets);
      return redirect('farms')->with('status', 'Farm Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
      $farm->delete();
      return redirect('farms')->with('status', 'Farm Deleted!');
    }
}
