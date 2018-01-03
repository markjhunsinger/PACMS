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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// players
Route::resource('players', 'PlayerController');

// spheres
Route::resource('spheres', 'SphereController');

// races
Route::resource('races', 'RaceController');

// skills
Route::resource('skills', 'SkillController');

// characters
Route::get('characters/create/{playerID}', 'CharacterController@create');
Route::get('characters/addSkill/{characterID}', 'CharacterController@addSkill');
Route::post('characters/storeCharacterSkill', 'CharacterController@storeCharacterSkill')->name('characters.storeCharacterSkill');
Route::post('characters/deleteCharacterSkill', 'CharacterController@deleteCharacterSkill')->name('characters.deleteCharacterSkill');
Route::get('characters/printCard/{characterID}', 'CharacterController@printCard');
Route::resource('characters', 'CharacterController');