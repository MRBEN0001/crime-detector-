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
    }

    public function crimeReportsIndex()
    {
        $reports = Crime::all();
        return view('admin.crime-reports')->with('reports', $reports);
    }
    public function crimeReports()
    {
        $reports = Crime::all();
        return view('admin.crimeReportsIndex')->with('reports', $reports);
    }
    public function reportDetails($id)
    {

        $report = Crime::find($id);

        return view("admin.report-details")->with("report", $report);
    }
    public function indexMail()
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

    public function mobilize(Request $request, $id)
    {
        Crime::find($id)->update([
            'squad' => $request->squad,
            'status' => 'Attended'
        ]);

        session()->flash('success', "Your report was successfully created, we will be at the crime scene in a jiffy!");
        return redirect("/report/crime");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeReportedCrime(Request $request)
    {

        Crime::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'crime_scene' => $request->scene,
        ]);


        // Record was created
        session()->flash('success', "Team succesfully mobilized");

        try {
            Mail::to("anenebenjaminjnr@outlook.com")->send(new CrimeMail([
                "subject" => $request->subject,
                "crime_scene" => $request->crime_scene,
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
