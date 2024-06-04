<?php

use App\Livewire\Ballots\BallotIndex;
use App\Livewire\Candidate\CandidateIndex;
use App\Livewire\Permission\PermissionIndex;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Votes\VoteIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

     Route::get('/candidates', CandidateIndex::class)->name('candidate.index');
     Route::get('/posts', PostIndex::class)->name('post.index');
     Route::get('/roles', RoleIndex::class)->name('role.index');
     Route::get('/permission', PermissionIndex::class)->name('permission.index');
     Route::get('/ballot', BallotIndex::class)->name('ballot.index');
     Route::get('/votes', VoteIndex::class)->name('vote.index');




});
