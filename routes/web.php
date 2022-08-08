<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestEnrollMentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-notification', [TestEnrollMentController::class, 'sendTestNotification']);
Route::get('/notification/view', [TestEnrollMentController::class, 'view_notification']);
Route::get('/notification/markasread/{id}/{user_id}', [TestEnrollMentController::class, 'markasread'])->name('markasread');
