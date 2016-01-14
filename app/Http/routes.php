<?php
Route::get('/',[
    'middleware' => 'auth',
    'as'=>'index',
    'uses'=>'taskController@index']);
Route::get('/Delete/{id}',
    ['middleware' => 'auth',
    'as'=>"delete",
    'uses'=>'taskController@delete']);
Route::get('/deleteStache/{id}',
    ['middleware' => 'auth',
        'as'=>"deleteStache",
        'uses'=>'ListeTaskController@deleteStache']);
Route::get('/AjoutTache',[
    'middleware' => 'auth',
    'as'=>'erreur',
    'uses'=>'ListeTaskController@erreur']);
Route::get('/AjoutTache/{id}',[
    'middleware' => 'auth',
    'as'=>'/AjouterTache',
    'uses'=>'ListeTaskController@index']);
Route::get('/update/{id}',[
    'middleware' => 'auth',
    'as'=>'viewEdit',
    'uses'=>'taskController@viewEdit']);
Route::get('/update', function () {return view('errorUrl');});
Route::post('/edit/{id}',[
    'middleware' => 'auth',
    'as'=>'edit',
    'uses'=>'taskController@edit']);
Route::get('/vieweditSTache/{id}',[
    'middleware' => 'auth',
    'as'=>'edit',
    'uses'=>'ListeTaskController@vieweditSTache']);
Route::post('/AddNewTask/{id}',[
    'middleware' => 'auth',
    'as'=>'createTaches',
    'uses'=>'ListeTaskController@createTaches']);
Route::get('/AddNewTask',[
    'middleware' => 'auth',
    'as'=>'erreur',
    'uses'=>'ListeTaskController@erreur']);
Route::get('/SeeSousTask/{id}',[
    'middleware' => 'auth',
    'as'=>'SeeSousTask',
    'uses'=>'ListeTaskController@SeeSousTask']);
Route::get('/NewTask/{id}',[
    'middleware' => 'auth',
    'as'=>'AddSousTaches',
    'uses'=>'ListeTaskController@AddSousTaches']);
Route::get('/NewTask',[
    'middleware' => 'auth',
    'as'=>'erreur',
    'uses'=>'ListeTaskController@erreur']);
/*Route::get('/login', function () {return view('login');});*/
Route::get('/list',[
    'middleware' => 'auth',
    'as'=>'index',
    'uses'=>'ListeTaskController@liste']);
Route::post('/task', [
    'middleware' => 'auth',
    'as'=>'postTask',
    'uses'=>'taskController@postTask']);
//Route::get('/upsousT/{id}',function(){return view('updateSousTache');});
Route::post('/editSTache/{id}', [
    'middleware' => 'auth',
    'as'=>'editSTache',
    'uses'=>'ListeTaskController@editSTache']);
Route::get('/SousTacheFin/{id}', [
    'middleware' => 'auth',
    'as'=>'postTask',
    'uses'=>'ListeTaskController@SousTacheFini']);
Route::get('/about', function () {return view('about');});
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
