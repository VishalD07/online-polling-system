<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Auth routes
require __DIR__.'/auth.php';

// ✅ Dashboard route
Route::get('/dashboard', function () {
    return redirect('/polls');
})->middleware(['auth'])->name('dashboard');

// ✅ Profile routes (THIS FIXES THE ERROR)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Poll routes
// ✅ Poll routes
Route::middleware(['auth'])->group(function () {
    Route::get('/polls', [PollController::class, 'index'])->name('polls.index');
    Route::get('/poll/{id}', [PollController::class, 'show'])->name('polls.show');

    // ✅ VOTE ROUTE (MODULE 2)
    Route::post('/vote', [PollController::class, 'vote'])->name('poll.vote');
    Route::get('/poll/{id}/results', [PollController::class, 'results'])->name('poll.results');
    // ✅ ADMIN routes (Module 4)
Route::get('/admin/poll/{id}/votes', [PollController::class, 'adminVotes'])
    ->name('admin.poll.votes');

Route::post('/admin/release-vote', [PollController::class, 'releaseVote'])
    ->name('admin.release.vote');

});

