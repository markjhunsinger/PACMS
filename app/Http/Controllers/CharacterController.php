<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

    public function create()
    {

        $data = array(

        );

        return view('newCharacter', $data);
    }
}
