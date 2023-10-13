<?php

use App\Http\Controllers\CalendarController;
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


// calender controllers
Route::get('/calendar/events', [CalendarController::class, 'getEvents'])->name('calendar.events');
Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');


//event controllers
Route::get('/events', 'EventController@index')->name('events.index');
Route::get('/events/create', 'EventController@create')->name('events.create');
Route::post('/events', 'EventController@store')->name('events.store');
Route::get('/events/{event}/edit', 'EventController@edit')->name('events.edit');
Route::put('/events/{event}', 'EventController@update')->name('events.update');
Route::delete('/events/{event}', 'EventController@destroy')->name('events.destroy');
