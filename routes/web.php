<?php

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/pokedex/{gen}/{pokemon}', 'PokedexController@detail')->name('pokedex-pokemon');

Route::get('/pokedex/{gen}', 'PokedexController@generation')->name('pokedex-generation');

Route::get('/pokedex', 'PokedexController@index')->name('pokedex');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/guide', 'PokedexController@guide')->name('guide');
    
    Route::get('/account', 'AccountController@index')->name('account');

    Route::get('/account/config', 'AccountController@config')->name('account-config');
    
    Route::post('/account/update', 'AccountController@update')->name('account-update');

    Route::get('/feed', 'FeedController@index')->name('feed');

    Route::get('/feed/share', 'FeedController@share')->name('feed-share');

    Route::post('/feed/create', 'FeedController@create')->name('feed-post');

    Route::get('/api/upvote/{post_id}', 'FeedController@upvote')->name('feed-upvote');

    Route::get('/api/downvote/{post_id}', 'FeedController@downvote')->name('feed-downvote');

    Route::get('/api/undovote/{post_id}', 'FeedController@undovote')->name('feed-undovote');

    Route::get('/builder', 'BuilderController@index')->name('builder');

    Route::get('/builder/create', 'BuilderController@create')->name('builder-create');

    Route::post('/builder/manage', 'BuilderController@manage')->name('builder-manage');
    
    Route::post('/api/builder/delete', 'BuilderController@delete')->name('builder-delete');

    Route::post('/api/builder/create', 'BuilderController@ajaxCreate')->name('builder-ajax-create');

    Route::post('/api/builder/save', 'BuilderController@ajaxSave')->name('builder-ajax-save');
});

Route::any('/{any}', 'PokedexController@error')->name('error')->where('any', '.*');

URL::forceScheme('https');