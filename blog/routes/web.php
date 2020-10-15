<?php

use Illuminate\Support\Facades\Route;
use \Carbon\Carbon;

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

Route::get('helloworld', function () {
    return "<h1>Hello World</h1>";
});

//Route::get('users', function() {
    //dd(App\User::all());
//});

//Route::get('users/{id}', function($id) {
    //dd(App\User::findOrFail($id));
//});

Route::get('registros', function() {
    foreach(App\User::all()->take(10) as $user){
        $years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
        $since = Carbon::parse($user->created_at);
        $rs[] = $user->fullname." - ".$years." - created ".$since->diffForHumans();
    }
    return view('registros', ['rs' => $rs]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/examples', function () {
    $users = App\User::all()->take(100);
    $categories = App\Category::all()->take(3);
    $games = App\Game::all();
    return view('examples',['users'=>$users,'categories'=>$categories,'games'=>$games]);
});

Route::resources([
    'users' => 'UserController',
    //'categories' => 'CategoryController',
    //'games' => 'GameController'
]);