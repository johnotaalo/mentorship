<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function(){
	Route::post('register', 'AuthController@register');
	Route::post('login', 'AuthController@login');
	Route::get('refresh', 'AuthController@refresh');
	Route::group(['middleware' => 'auth:api'], function(){
		Route::get('user', 'AuthController@user');
		Route::post('logout', 'AuthController@logout');
	});
});

Route::prefix('data')->group(function(){
	Route::get('mentors', 'API\MentorsController@get');
	Route::get('mentors-data', 'API\MentorsController@getData');
	Route::get('counties', 'API\CountyController@get');
	Route::get('subcounties/{county_id}', 'API\CountyController@getSubcounties');
	Route::get('facilities/{subcounty?}', 'API\FacilityController@get');

	Route::get('skills', 'API\MentorsController@getSkills');
	Route::get('sites', 'API\MentorsController@getSites');
	Route::get('resources', 'API\MentorsController@getResources');
	Route::get('cases', 'API\MentorsController@getCases');

	Route::post('workplan', 'API\WorkplanController@add');
	Route::get('/workplan/{id}', 'API\WorkplanController@getWorkplan');
	Route::get('/workplans/{month}/{year}', 'API\WorkplanController@all');
	Route::get('/all-workplans/yearly/{year}', 'API\WorkplanController@getWorkplansByMonth');
});
