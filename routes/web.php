<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });
// Route::get('/candidates', function () {
//     return view('candidates.index');
// });

Route::get('/candidates', [AdminController::class, 'showCandidates'])->name('candidates');
Route::post('/candidates', [AdminController::class, 'storeCandidate'])->name('candidates.store');

Route::get('/candidates', [AdminController::class, 'showCandidates'])->name('candidates.index');
Route::get('/candidates/{id}/edit', [AdminController::class, 'editCandidate'])->name('candidates.edit');
Route::put('/candidates/{id}', [AdminController::class, 'updateCandidate'])->name('candidates.update');
Route::delete('/candidates/{id}', [AdminController::class, 'destroyCandidate'])->name('candidates.destroy');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');



// Route::get('/voters', [AdminController::class, 'showCandidates'])->name('candidates');
// Route::post('/voters', [AdminController::class, 'storeCandidate'])->name('candidates.store');
// Route::get('/voters', function () {
//     return view('voters.index');
// });

Route::get('/voters', [VoterController::class, 'index'])->name('voters.index');
Route::post('/voters', [VoterController::class, 'store'])->name('voters.store');
Route::delete('/voters/{voter}', [VoterController::class, 'destroy'])->name('voters.destroy');



// Voting system routes

Route::get('/login', [VotingController::class, 'showLogin'])->name('vote.login');
Route::post('/send-otp', [VotingController::class, 'sendOtp'])->name('vote.sendOtp');

Route::get('/otp-verification', [VotingController::class, 'showOtpPage'])->name('vote.otp');
Route::post('/verify-otp', [VotingController::class, 'verifyOtp'])->name('vote.verifyOtp');

Route::get('/cast-vote', [VotingController::class, 'showVotingPage'])->name('vote.show');
Route::post('/cast-vote', [VotingController::class, 'castVote'])->name('vote.index');
Route::get('/thanks', [VotingController::class, 'showThanksPage'])->name('vote.thanks');
