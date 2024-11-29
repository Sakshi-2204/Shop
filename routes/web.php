<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;



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
    return view('dash.dashb');
});

Route::get('/test', function () {
   dd(Auth::user(),session());
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::get('registration', [AuthController::class, 'registration'])->name('register');

Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('create',[PostController::class,'create'])->name('create');

Route::get('/admin',[AuthController::class,'adminDashboard']);



// // Route::get('/posts/create', PostController::class . '@create')->name('posts.create');
// // adds a post to the database
// Route::post('/posts', PostController::class .'@store')->name('posts.store');
// // returns a page that shows a full post
// Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// // returns the form for editing a post
// Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// // updates a post
// Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// // deletes a post
// Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');

