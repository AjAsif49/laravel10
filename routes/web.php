<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// $users = DB::table('users')->get();

// $user = DB::table('users')->where('id', 2)->update(['email' => 'enu@gmail.com']);
// $user = DB::table('users')->where('id', 2)->delete();

//create new user

// $user = DB::insert('insert into users (name, email, password) values(?,?,?)', [
//     'Salman',
//     'Salman@gmail.com',
//     'password',
// ]);

// $user = DB::table('users')->insert([
//     'name' => 'asif',
//     'email' => 'asif@gmail.com',
//     'password' => 'password'
// ]);

// $user = User::create([
//     'name' => 'enan',
//     'email' => 'enan@gmail.com',
//     'password' => 'password'
// ]);

$users = User::get();



// $user= User::find(3);
// $user->update([
//     'email' => 'enan@gmail.com',
// ]);

// $user= User::find(3);
// $user->delete();

dd($users);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
