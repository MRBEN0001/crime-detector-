<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSquadRequest;
use App\Models\Squad;
use Illuminate\Http\Request;

class SquadController extends Controller
{
    public function createSquadIndex()
    {
        return view("admin.create-squad");
    }

    public function storeSquad(CreateSquadRequest $request)
    {
    //   dd("squad");
        $squad = Squad::firstOrCreate(
            [
                'squad_name' => $request->squadName
            ],
            [
                'squad_name' => $request->squadName,
                'squad_leader' => $request->squadLeader

            ]
        );
        if ($squad->wasRecentlyCreated) {
            // Record was created
            session()->flash('success', "Squad was created successfully!");
        } else {
            // Record already exists
            session()->flash('warning', "Squad already created before now! ");
        }

        return redirect()->route('index.create.squad');


    }
}
