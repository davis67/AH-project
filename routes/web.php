<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/tests', function () {
    return App\Models\Leave::find(1)->user;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//users controller
    Route::resource('users', 'UsersManagementController');
    Route::resource('users.profile','ProfileController');
    Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

//leave controller
Route::resource('leaves', 'leavesController');
Route::get('leaves/acceptLeave', 'leavesController@acceptLeave');
Route::get('leaves/reviewLeave', 'leavesController@reviewLeave');
Route::get('leaves/approveLeave', 'leavesController@approveLeave');
Route::get('leaves/rejectLeave/{id}', 'leavesController@rejectLeave');
Route::get('leaves/leaveDetails', 'leavesController@leaveDetails');

/*
* Opportunities controller
*/

Route::get('/opportunities/trashed', 'OpportunityController@trashed');
Route::post('/opportunities/changeStatus', 'OpportunityController@changeStatus')->name('changeStatus');
Route::get('/removeOpportunities/{id}', 'OpportunityController@removeOpportunities');
Route::get('/restoreOpportunities/{id}', 'OpportunityController@restoreOpportunities');
Route::get('opportunities/viewall', 'OpportunityController@viewAll')->name('viewall')->middleware('check-permission:Admin');
Route::resource('opportunities', 'OpportunityController');


/*
* Projects controller
*/

Route::resource('projects', 'ProjectController');
Route::get('/create/{id}', 'ProjectController@create')->name('projects.create');
Route::post('projects/addassociate/{id}', 'ProjectController@AddAssociate')->name('addassociates');
Route::post('projects/createprojectuser/{id}', 'ProjectController@createProjectUser')->name('addconsultants');

/*
* teams controller
*/
Route::resource('teams', 'TeamController');

/*
* documents controller
*/
Route::resource('files', 'FileController');
Route::get('/files/upload','FileController@create')->name('formfile');
Route::delete('/files/{id}','FileController@destroy')->name('deletefile');
Route::get('/files/download/{id}','FileController@show')->name('downloadfile');
Route::get('/files/email/{id}','FileController@edit')->name('emailfile');

/**
 * contacts
 */
 Route::resource('contacts', 'ContactController')->middleware('check-permission:Consultant');
//Route::resource('contacts', 'ContactController');

/**
 * opportunity tasks controller
 */
Route::resource('opptasks', 'OppsTaskController');


/*
* Project tasks..
*/
Route::resource('opptasks', 'OppsTaskController');
Route::resource('projects.tasks', 'TaskController');
Route::resource('holidays', 'HolidaysController');
Route::resource('subtasks', 'SubtaskController');
Route::get('/subtasks/createtask/{id}/', 'SubtaskController@createtask')->name('subtasks.createtask');


/*
* Associates controller..
*/
Route::resource('associates', 'AssociatesController');
Route::get('/associates/download/{id}','AssociatesController@downloadCV')->name('downloadcv');