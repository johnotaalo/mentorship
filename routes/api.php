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

Route::prefix('data')->group(function(){
	Route::get('mentors', 'API\MentorsController@get');
	Route::get('mentors-data', 'API\MentorsController@getData');
	Route::get('counties', 'API\CountyController@get');
	Route::get('subcounties/{county_id}', 'API\CountyController@getSubcounties');
	Route::get('facilities/{subcounty?}', 'API\FacilityController@get');

	Route::get('skills', 'API\MentorsController@getSkills');
});
