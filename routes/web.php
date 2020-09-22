<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'Auth\LoginController@showLoginForm');

Route::middleware(['auth'])->group(function () {
    // Route::get('/stories', 'StoriesController@index')->name('stories.index');
    // Route::get('/stories/{story}', 'StoriesController@show')->name('stories.show');
    Route::resource('stories', 'StoriesController');

    Route::get('/edit-profile', 'ProfilesController@edit')->name('profiles.edit');
    Route::put('/edit-profile/{user}', 'ProfilesController@update')->name('profiles.update');
});


Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::get('/story/{activeStory:slug}', 'DashboardController@show')->name('dashboard.show');

Route::get('/email', 'DashboardController@email')->name('dashboard.email');

Route::namespace('Admin')->name('admin.stories.')->prefix('admin')->middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/deleted_stories', 'StoriesController@index')->name('index');
    Route::put('/stories/restore/{id}', 'StoriesController@restore')->name('restore');
    Route::delete('/stories/delete/{id}', 'StoriesController@delete')->name('delete');
    Route::get('/stories/stats', 'StoriesController@stats')->name('stats');
});

Route::get('/image', function () {
    $imagePath = public_path('storage/unsplash.jpg');
    $writePath = public_path('storage/thumbnail.jpg');

    $img = Image::make($imagePath)->resize(225, 100);
    $img->save($writePath);
    return $img->response('jpg');
});
