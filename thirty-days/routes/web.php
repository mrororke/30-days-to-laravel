<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\TranslateJob;
use App\Models\Job;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('test', function () {
    $job = Job::first();

    TranslateJob::dispatch($job);

    return 'Done';
});


// JobController
//Route::resource('jobs', JobController::class);
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job'); //policy + model

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create','create');
//     Route::get('/jobs/{job}','show');
//     Route::post('/jobs','store');
//     Route::get('/jobs/{job}/edit','edit');
//     Route::patch('/jobs/{job}','update');
//     Route::delete('/jobs/{job}','destroy');
// });


