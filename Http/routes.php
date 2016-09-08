<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'HomeController@redirect');
});
Route::post('/send', 'EmailController@send');
Route::group(['middleware' => ['super']], function () {
	
	Route::get('getfilm/{id}', 'FilmController@getEditData');
	Route::get('getParameter/{id}', 'RatersController@getParameter');
	Route::post('rate/{id}', 'RatersController@store');
	Route::post('storeTimeOccurance', 'RatersController@storeTimeOccurance');
	Route::get('rate/{id}', 'RatersController@rate');
	Route::get('get_temp_param/{filmID}', 'RatersController@get_temp_param');
	Route::get('get_theme_time_occurance/{filmID}', 'RatersController@get_theme_time_occurance');
	Route::get('getlogs', 'AuditLogsController@getLogs');
	Route::get('films/get_list', 'FilmController@getFilmsList');
	Route::get('reports/get_list', 'ReportController@getFilmsList');
	Route::get('films/synopsis', 'FilmController@filmSynopsis');
	Route::post('poster', 'FilmController@poster');
	Route::post('video', 'FilmController@video');
	Route::get('/profile', 'ProfileController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index');
	Route::get('/reports_dasboard', 'HomeController@reportsDasboard');
	Route::get('/lock', 'ProfileController@lock');
	Route::get('/unrated/get_list/', 'UnratedController@getFilmsList');
	Route::get('/rated/get_list/', 'RatedController@getFilmsList');
	Route::get('/get_films_to_rate/', 'RatersController@getFilmsList');
	Route::get('/get_films_posters_to_rate/', 'RatersController@getFilmsPostersList');
	Route::get('/rate_poster/', 'RatersController@rate_poster');
	Route::get('/poster_rate/{id}', 'RatersController@poster_rate');
	Route::post('/poster_rate/{id}', 'RatersController@store_poster_rate');
	Route::get('/certificate/print/{id}', 'RatedController@printCertificate');
	Route::get('certificate/poster/{id}', 'RatedController@posterCertificate');
	Route::get('/declined/get_list/', 'DeclinedController@getFilmsList');
	Route::get('/getusers/{id}', 'UserController@getusers');
    Route::get('/reviewrate/{id}', 'ModeratorController@reviewrate');
    Route::get('/getnonratedfilms', 'ModeratorController@getnonratedfilms');
    Route::get('/getnonratedfilmnosynopser', 'ModeratorController@getnonratedfilmnosynopser');
    Route::get('/getfilmthemeoccurance/{id}', 'ModeratorController@getfilmthemeoccurance');
    Route::get('/moderator/new', 'ModeratorController@unrated');
    Route::put('choose_examiner/{id}', 'ModeratorController@chooseExaminer');
    Route::get('/getraters_reviews/{id}', 'ModeratorController@getraters_reviews');
    Route::get('/getuseraters/{id}', 'ModeratorController@getuseraters');
    Route::get('/get_theme_params/{id}', 'ModeratorController@get_theme_params');
    Route::get('/declined/report/{id}', 'ReportController@printDeclinedReport');
    Route::get('/print/report/{id}', 'ReportController@printModeratedReport');
    Route::get('getusers/{status}', 'UserController@getUser');
    Route::get('getuserbyid/{id}', 'UserController@getUserById');
	Route::get('usergroups/{status}', 'GroupController@getUserGroups');
	Route::get('ratedfilms', 'FilmController@ratedfilms');
    Route::post('/relogin', 'ProfileController@relogin');
    Route::post('/savereject', 'ModeratorController@savereject');
    Route::post('/storerate/', 'RatersController@storeRate');
    Route::delete('/removerate/', 'RatersController@removerate');
	Route::resource('/users', 'UserController');
	Route::get('/reports/detailed/{id}', 'ReportController@detailed');
	Route::resource('/reports', 'ReportController');
	Route::resource('/auditlogs', 'AuditLogsController');
	Route::resource('films', 'FilmController');
	Route::resource('genre', 'GenreController');
	Route::resource('/usergroups', 'GroupController');
	Route::resource('/moderator', 'ModeratorController');
	Route::resource('/rater', 'RatersController');
	Route::resource('/unrated', 'UnratedController');
	Route::resource('/rated', 'RatedController');
	Route::resource('/declined', 'DeclinedController');

	Route::get('/get_client_films', 'ClientFilmController@get_client_films');
	Route::get('/get_client_profile', 'ClientFilmController@get_client_films');
	Route::get('/client_profile', 'ClientController@client_profile');
	Route::post('/client_profile', 'ClientController@update_picture');
	Route::post('/delete/film', 'ClientFilmController@delete');
	Route::post('upload_film', 'ClientFilmController@upload_film');
	Route::resource('/client', 'ClientController');
	Route::resource('/client_film', 'ClientFilmController');
});