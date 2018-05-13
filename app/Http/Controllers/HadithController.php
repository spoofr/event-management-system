<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hadith;
use Session;

class HadithController extends Controller
{
    public function create()
    {
        $hadiths = Hadith::all();
        return view('hadith.create', compact('hadiths'));
    }

    public function store(Request $request)
    {
        $hadith = new Hadith; 

        $hadith->hadith_title = $request->hadith_title;
        $hadith->hadith_matan = $request->hadith_matan;
        $hadith->hadith_meaning = $request->hadith_meaning;
        $hadith->hadith_narrator = $request->hadith_narrator;
        $hadith->hadith_sanad = $request->hadith_sanad;

        // Save to database
        $hadith->save();

        // Display message
        Session::flash('success', 'Hadith has been successfully added!');

        // Return views
        return redirect()->route('hadith.create');
    }

    public function destroy($id)
    {
        $hadith = Hadith::find($id);
        $hadith->delete();
        Session::flash('success', 'Hadith has been successfully deleted!');
        return redirect()->route('hadith.create');
    }
}
