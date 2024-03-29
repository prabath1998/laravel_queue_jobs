<?php

use App\Jobs\FirstJob;
use App\Mail\FirstMail;
use App\Mail\SecondMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-mail', function () {
    $user = Auth::user();
    // Mail::to($user->email)->send(new FirstMail($user->name));
    // Mail::to($user->email)->queue(new SecondMail());
    $delay = now()->addMinutes(1);
    // FirstJob::dispatch();
    dispatch(new FirstJob)->delay($delay);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
