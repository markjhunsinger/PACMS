<?php

namespace App\Http\Controllers;

use Anouar\Fpdf\Fpdf;
use App\Character;
use App\Player;

use App\Http\Requests\StoreCharacterRequest;

use fpdi\FPDI;
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

    public function printCharacterCard($characterID)
    {
        $character = Character::findOrFail($characterID);

        $data = array(
            'player' => $character->player,
            'character' => $character
        );

        $pdf = new \fpdi\FPDI('P', 'pt');
        $pdf->AddPage();
        $pdf->setSourceFile(public_path('character_card.pdf'));
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $this->writeCharacterCardData($pdf, $data);
        $pdf->Output($character->character_name . '.pdf', 'I');

    }

    private function writeCharacterCardData(&$pdf, $data)
    {
        $pdf->SetFont('Arial', '', 14);

        // character name
        $pdf->SetXY(80, 153);
        $pdf->Write(0, $data['character']->character_name);

        // character number
        $pdf->SetXY(450, 153);
        $pdf->Write(0, $data['character']->character_number);

        // roleplaying points
        // unspent build
        // deaths
        // total build
        // last played
        // body
        // ammo
        // stress
        // pre
        // end
        // foc
        // skills (needs a lot of work)
        // skill queue (also needs a lot of work)
    }
}
