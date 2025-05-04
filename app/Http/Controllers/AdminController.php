<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voters;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
{
    $candidates = Candidate::all()->groupBy('position');

    $totalVoters = Voters::count();
    $totalVotes = Voters::where('has_voted', true)->count();
    $votePercentage = $totalVoters > 0
        ? round(($totalVotes / $totalVoters) * 100, 2) . '% of Total vote'
        : '0% of Total vote';

    return view('dashboard.index', [
        'candidates' => $candidates,
        'stats' => [
            ['label' => 'Total Votes', 'value' => $totalVotes],
            ['label' => 'Total Voters', 'value' => $totalVoters],
            ['label' => 'Vote Percentage', 'value' => $votePercentage],
        ],
    ]);
}

    public function showCandidates()
    {
        $candidates = Candidate::all()->groupBy('position');
        return view('candidates.index', compact('candidates'));
    }

    public function storeCandidate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'position' => 'required',
        ]);

        $imagePath = $request->file('symbol')->store('symbols', 'public');

        Candidate::create([
        'name' => $request->name,
        'symbol' => $imagePath = $request->file('symbol')->store('symbols', 'public'),
        'position' => $request->position,
        ]);

        return back()->with('success', 'Candidate added successfully!');
    }

    public function editCandidate($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.edit', compact('candidate'));
    }

    public function updateCandidate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'symbol' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $candidate = Candidate::findOrFail($id);

        if ($request->hasFile('symbol')) {
            $imagePath = $request->file('symbol')->store('symbols', 'public');
            $candidate->symbol = $imagePath;
        }

        $candidate->name = $request->name;
        $candidate->position = $request->position;
        $candidate->save();

        return redirect()->route('candidates.index')->with('success', 'Candidate updated!');
    }

    public function destroyCandidate($id)
    {
            $candidate = Candidate::findOrFail($id);
            $candidate->delete();

            return back()->with('success', 'Candidate deleted!');
    }


}
