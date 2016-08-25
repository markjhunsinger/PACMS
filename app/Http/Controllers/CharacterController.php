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
        $pdf->setSourceFile(public_path('card-20160824.pdf'));
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $this->writeCharacterCardData($pdf, $data);
        $pdf->Output($character->character_name . '.pdf', 'I');

    }

    private function writeCharacterCardData(&$pdf, $data)
    {
        $pdf->SetFont('Arial', '', 14);

        // player name
        $pdf->SetXY(80, 131);
        $pdf->Write(0, $data['player']->last_name . ', ' . $data['player']->first_name);

        // service points
        $pdf->SetXY(420, 131);
        $pdf->Write(0, $data['player']->service_points);

        $yCoord = 202;
        $incrementer = 19;

        // character name
        $pdf->SetXY(160, $yCoord);
        $pdf->Write(0, $data['character']->character_name);

        // badge #
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->character_number);

        // last played
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->last_played != '0000-00-00 00:00:00' ? date('Ymd', strtotime($data['character']->last_played)) : '00000000');

        // body
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->body);

        // total build
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->build_total);

        // unspent build
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->build_unspent);

        // stress level
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->stress_level);

        // roleplaying points TODO: needs database entry, OOPS!
        $pdf->SetXY(160, $yCoord += $incrementer);
        //$pdf->Write(0, $data['character']->rp_points);

        // deaths
        $pdf->SetXY(160, $yCoord += $incrementer);
        $pdf->Write(0, $data['character']->deaths);

        // pre
        $pdf->SetXY(348, 229);
        $pdf->Write(0, $data['character']->pre);

        // end
        $pdf->SetXY(348, 263);
        $pdf->Write(0, $data['character']->end);

        // foc
        $pdf->SetXY(348, 297);
        $pdf->Write(0, $data['character']->foc);

        // skills (needs a lot of work)
        // skill queue (also needs a lot of work)
    }
}
