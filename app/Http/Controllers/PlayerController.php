<?php

namespace App\Http\Controllers;

use App\Player;
use App\Http\Requests\StorePlayer;
use App\Http\Requests\UpdatePlayer;
use Illuminate\Http\Request;
use Input;
use Redirect;

class PlayerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// get all players from the database
    	$players = Player::orderBy('last_name', 'asc')->get();
    	
    	$data['players'] = $players;
    	
    	return view('players', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = [];
    	
    	return view('createPlayer', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayer $request, Player $player)
    {
    	$player->fill(Input::all());
    	$player->save();
    	
    	return Redirect::to('players');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$player = Player::find($id);
    	$characters = $player->characters;
    	
    	$data['player'] = $player;
    	$data['characters'] = $characters;
    	
        return view('playerInfo', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$player = Player::findOrFail($id);
    	
    	$data = [
    		'player' => $player
    	];
    	
    	return view('editPlayer', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayer $request, $id)
    {
    	$player = Player::findOrFail($id);
    	$player->fill(Input::all());
    	
    	$player->save();
    	
    	return Redirect::to('players/' . $player->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
