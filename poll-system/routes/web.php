<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Default Route → LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

// Auth routes
require __DIR__.'/auth.php';

// Dashboard → Polls
Route::get('/dashboard', function () {
    return redirect('/polls');
})->middleware(['auth'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Poll routes (User)
Route::middleware(['auth'])->group(function () {
    Route::get('/polls', [PollController::class, 'index'])->name('polls.index');
    Route::get('/poll/{id}', [PollController::class, 'show'])->name('polls.show');

    // Voting
    Route::post('/vote', [PollController::class, 'vote'])->name('poll.vote');

    // Live results
    Route::get('/poll/{id}/results', [PollController::class, 'results'])->name('poll.results');

    // Admin routes
    Route::get('/admin/poll/{id}/votes', [PollController::class, 'adminVotes'])
        ->name('admin.poll.votes');

    Route::post('/admin/release-vote', [PollController::class, 'releaseVote'])
        ->name('admin.release.vote');
});
