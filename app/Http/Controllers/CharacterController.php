<?php

namespace App\Http\Controllers;

use App\Character;
use App\Player;

use App\Http\Requests\StoreCharacterRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CharacterController extends Controller
{
    public function show($id)
    {
        $character = Character::findOrFail($id);

        $data = array(
            'character' => $character
        );

        return view('showCharacter', $data)->nest('characterInfo', 'child.characterInfo', $data);
    }

    public function create($playerID)
    {
        $player = Player::findOrFail($playerID);
        $data = array(
            'player' => $player
        );

        return view('newCharacter', $data);
    }

    public function store(StoreCharacterRequest $request, Character $character)
    {
        $character->fill(Input::all());
        $character->updated_by = 'Colony Alpha Staff';
        $character->save();

        return Redirect::to('characters/' . $character->id);
    }
}
