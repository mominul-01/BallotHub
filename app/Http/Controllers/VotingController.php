<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voters;
use App\Services\TwilioVerifyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Session;


class VotingController extends Controller
{
    public function showLogin() {
        return view('vote.login');
    }


// public function sendOtp(Request $request, TwilioVerifyService $twilio)
// {
//     // return $request  ->all();

//     $request->validate([
//         'mobile' => 'required|numeric'
//     ]);

//     $twilio->sendOTP($request->mobile);
//     session(['mobile' => $request->mobile]);

//     return redirect()->route('vote.otp')->with('status', 'OTP sent to your phone.');
// }

    public function sendOtp(Request $request) {
        $request->validate([
            'voter_id' => 'required|exists:voters,voter_id',
            'mobile' => 'required'
        ]);

        $voter = Voters::where('voter_id', $request->voter_id)
                      ->where('mobile', $request->mobile)
                      ->first();

        if (!$voter) {
            return back()->withErrors(['voter_id' => 'Invalid Voter ID or Mobile number']);
        }

        $otp = rand(100000, 999999); // 6-digit OTP
        session()->put('otp', $otp);
        session()->put('voter_id', $voter->id);

        return redirect()->route('vote.otp')->with('success', "Your OTP is: $otp");
    }

    public function showOtpPage() {
        return view('vote.otp');
    }


    public function verifyOtp(Request $request) {



        $request->validate([
            'otp' => 'required|array|size:6',
            'otp.*' => 'required|numeric'
        ]);

        $enteredOtp = implode('', $request->otp); // Combine all 6 digits
        $sessionOtp = session()->get('otp');
        // return $sessionOtp."-" .$enteredOtp;

        if ($enteredOtp == $sessionOtp) {
            session()->put('voted', false);
            return redirect('/cast-vote'); // This route should exist
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }


    }
//     public function verifyOtp(Request $request, TwilioVerifyService $twilio)
// {
//     $request->validate([
//         'otp' => 'required|numeric',
//     ]);

//     $verification = $twilio->checkVerificationCode(session('mobile'), $request->otp);

//     if ($verification->status === 'approved') {
//         // OTP matched
//         return redirect()->route('vote.cast-vote')->with('success', 'OTP verified successfully!');
//     }

//     return back()->withErrors(['otp' => 'Invalid OTP.']);
// }


    public function showVotingPage() {
        $voterId = session()->get('voter_id');
        $voter = Voters::find($voterId);

        if (!$voter) {
            return redirect()->route('vote.login')->withErrors(['voter_id' => 'Voter not found']);
        }

        if ($voter->has_voted) {
            return redirect()->route('vote.login')->withErrors(['voted' => 'You have already voted']);
        }
        $candidates = Candidate::all()->groupBy('position'); // Ensure this works correctly

        return view('vote.index', compact('candidates'));
    }

    public function castVote(Request $request)
    {
        $votes = $request->input('selected');

        // Validate all selected candidate IDs
        foreach ($votes as $position => $candidateId) {
            $request->merge(['candidate_id' => $candidateId]); // temporarily merge for validation
            $request->validate([
                'candidate_id' => 'required|exists:candidates,id',
            ]);
        }

        $voterId = session()->get('voter_id');
        $voter = Voters::find($voterId);

        if (!$voter || $voter->has_voted) {
            return redirect()->route('vote.login')->withErrors(['voted' => 'Invalid or already voted']);
        }

        // Record votes
        foreach ($votes as $position => $candidateId) {
            $candidate = Candidate::find($candidateId);
            $candidate->votes += 1;
            $candidate->save();

            // Optionally, store a record in a `votes` table (recommended for logs/audits)
            // Vote::create([...])
        }

        $voter->has_voted = true;
        $voter->save();

        session()->put('voted', true);
        return redirect()->route('vote.thanks')->with('success', 'Your vote has been cast successfully!');
    }

    public function showThanksPage() {
        return view('vote.thanks');
    }


}
