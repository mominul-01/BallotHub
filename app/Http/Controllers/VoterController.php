<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    //
    public function index()
    {
        $voters = Voters::all();
        return view('voters.index', compact('voters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'voter_id' => 'required|unique:voters',
            'mobile' => 'required',
        ]);

        Voters::create($request->all());

        return redirect()->back()->with('success', 'Voter added successfully.');
    }

    public function destroy(Voters $voter)
    {
        $voter->delete();
        return redirect()->back()->with('success', 'Voter deleted.');
    }

}

