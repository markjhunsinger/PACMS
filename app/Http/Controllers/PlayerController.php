<?php

namespace App\Http\Controllers;

use App\Character;
use App\State;
use Illuminate\Http\Request;

use App\Http\Requests\UpdatePlayerRequest;

use App\Player;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

/* Gbrock table namespaces */
use Gbrock\Table\Facades\Table;
use Gbrock\Table\Traits\Sortable;

use Form;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $players = Player::sorted('last_name')->paginate();
        $playersTable = Table::create($players, ['last_name', 'first_name']);
        $playersTable->setView('tables.playerstable');

        $data = array(
            'playersTable' => $playersTable
        );

        return view('players', $data);
    }

    public function show($id) {
        $player = Player::findOrFail($id);

        $characters = Character::where('player_id', $id)->orderBy('character_name', 'asc')->get();
        $charactersTable = Table::create($characters, ['character_name']);
        $charactersTable->setView('tables.characterstable');

        $data = array(
            'player' => $player,
            'charactersTable' => $charactersTable
        );

        return view('showPlayer', $data)->nest('playerInfo', 'child.playerInfo', $data);
    }

    public function edit($id) {
        $player = Player::findOrFail($id);

        // TODO (mark): redo this section to just pull in the states correctly
        $states = State::all(array('code', 'name'));
        $newStates = array();
        foreach ($states as $state) {
            $newStates[$state['code']] = $state['name'];
        }

        $data = array(
            'player' => $player,
            'states' => $newStates
        );

        return view('editPlayer', $data);
    }

    public function update(UpdatePlayerRequest $request, $id) {
        $player = Player::findOrFail($id);

        $player->fill(Input::all());
        $player->save();
        return Redirect::to('players/' . $player->id);
    }

    public function create() {

        // TODO (mark): redo this section to just pull in the states correctly
        $states = State::all(array('code', 'name'));
        $newStates = array();
        foreach ($states as $state) {
            $newStates[$state['code']] = $state['name'];
        }

        $data = array(
            'states' => $newStates
        );
        return view('newPlayer', $data);
    }

    // TODO: eventually convert to StorePlayerRequest for validation
    public function store(Player $player) {
        $rules = array(
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'email',
            'zip' => 'digits:5',
            'service_points' => 'integer|between:0,1000',
            'event_credits' => 'integer|between:0,1000'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::route('players.create')->withErrors($messages)->withInput(Input::all());
        }
        else {
            $player->fill(Input::all());
            $player->save();
            return Redirect::to('players/' . $player->id);
        }
    }
}
