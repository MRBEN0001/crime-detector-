<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CrimeFormRequest;
use App\Mail\CrimeMail;
use App\Models\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('welcome');
    }  public function indexMail()
    {

       
        return view('crime-mail-view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function indexReportCrime()
    {
        return view('report-crime');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeReportedCrime( CrimeFormRequest  $request)
    {

        $user = Crime::firstOrCreate(
            [
                'crime' => $request->crime
            ],
            [
                'crime' => $request->crime,
                'crime_scene' => $request->crimeScene,
                'crime_time' => $request->crimeTime,

            ]
        );

        if ($user->wasRecentlyCreated) {
            // Record was created
            session()->flash('success', "Your report was successfully created, we will be at the crime scene in a giffy!");
        } else {
            // Record already exists
            session()->flash('warning', "You already reported this crime! ");
        }


        try {
            Mail::to("anenebenjaminjnr@outlook.com")->send(new CrimeMail([ 
                // "unique_id" => $vaccinated->unique_id,
                // "name" => $user->name,
                "crime" => $user->crime,
                 "crime_scene" => $user->crime_scene, 
                 "crime_time" => $user->crime_time,
            ]));
        } catch (\Throwable $error) {
            Log::error('SMTP network error: ' . $error->getMessage());
        }

        return redirect("/report/crime");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

