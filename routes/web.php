<?php

use App\Livewire\Candidate\CandidateIndex;
use App\Livewire\Posts\PostIndex;
use App\Livewire\Roles\RoleIndex;
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


});
