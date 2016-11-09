<?php

/**
* Home
*/
Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);

/******************************************/

/**
* Authentication
*/
Route::get('/signup', [
	'uses' => 'AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => 'AuthController@postSignup',
	'middleware' => ['guest'],
]);

Route::get('/signin', [
	'uses' => 'AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],
]);

Route::post('/signin', [
	'uses' => 'AuthController@postSignin',
	'middleware' => ['guest'],
]);

Route::get('/signout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'auth.signout',
]);


/**
* User profile
*/
Route::get('/profile', [
	'uses' => 'ProfileController@getEditProfile',
	'as' => 'profile',
	'middleware' => ['auth'],
]);

Route::post('/profile', [
	'uses' => 'ProfileController@postEditProfile',
	'middleware' => ['auth'],
]);


/******************************************/

/**
* Dashboard
*/
Route::get('/dashboard', [
	'uses' => 'DashboardController@index',
	'as' => 'dashboard',
]);

/**
* Task
*/
Route::get('/tasks', [
	'uses' => 'TasksController@index',
	'as' => 'tasks',
]);

/******************************************/

/**
* Search
*/
Route::get('/search', [
	'uses' => 'SearchController@getResults',
	'as' => 'search.results',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

/******************************************/

/**
* Computers
*/
Route::get('/computers', [
	'uses' => 'ComputerController@index',
	'as' => 'computers',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/computers/create', [
	'uses' => 'ComputerController@create',
	'as' => 'computers.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/computers/{id}', [
	'uses' => 'ComputerController@show',
	'as' => 'computers.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/computers/{id}/edit', [
	'uses' => 'ComputerController@edit',
	'as' => 'computers.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/computers', [
	'uses' => 'ComputerController@store',
	'as' => 'computers.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/computers/{id}', [
	'uses' => 'ComputerController@update',
	'as' => 'computers.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);


/**
* Peripherals
*/
Route::get('/peripherals', [
	'uses' => 'PeripheralController@index',
	'as' => 'peripherals',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/peripherals/create', [
	'uses' => 'PeripheralController@create',
	'as' => 'peripherals.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/peripherals/{id}', [
	'uses' => 'PeripheralController@show',
	'as' => 'peripherals.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/peripherals/{id}/edit', [
	'uses' => 'PeripheralController@edit',
	'as' => 'peripherals.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/peripherals', [
	'uses' => 'PeripheralController@store',
	'as' => 'peripherals.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/peripherals/{id}', [
	'uses' => 'PeripheralController@update',
	'as' => 'peripherals.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);


/**
* Networkprinters
*/
Route::get('/networkprinters', [
	'uses' => 'NetworkprinterController@index',
	'as' => 'networkprinters',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/networkprinters/create', [
	'uses' => 'NetworkprinterController@create',
	'as' => 'networkprinters.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/networkprinters/{id}', [
	'uses' => 'NetworkprinterController@show',
	'as' => 'networkprinters.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/networkprinters/{id}/edit', [
	'uses' => 'NetworkprinterController@edit',
	'as' => 'networkprinters.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/networkprinters', [
	'uses' => 'NetworkprinterController@store',
	'as' => 'networkprinters.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/networkprinters/{id}', [
	'uses' => 'NetworkprinterController@update',
	'as' => 'networkprinters.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

/******************************************/

/**
* Employees
*/
Route::get('/employees', [
	'uses' => 'EmployeeController@index',
	'as' => 'employees',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/employees/create', [
	'uses' => 'EmployeeController@create',
	'as' => 'employees.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/employees/{id}', [
	'uses' => 'EmployeeController@show',
	'as' => 'employees.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/employees/{id}/edit', [
	'uses' => 'EmployeeController@edit',
	'as' => 'employees.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/employees', [
	'uses' => 'EmployeeController@store',
	'as' => 'employees.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/employees/{id}', [
	'uses' => 'EmployeeController@update',
	'as' => 'employees.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

 
/**
* Accounts
*/
Route::get('/accounts', [
	'uses' => 'AccountController@index',
	'as' => 'accounts',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/accounts/create', [
	'uses' => 'AccountController@create',
	'as' => 'accounts.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/accounts/{id}', [
	'uses' => 'AccountController@show',
	'as' => 'accounts.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/accounts/{id}/edit', [
	'uses' => 'AccountController@edit',
	'as' => 'accounts.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/accounts', [
	'uses' => 'AccountController@store',
	'as' => 'accounts.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/accounts/{id}', [
	'uses' => 'AccountController@update',
	'as' => 'accounts.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

/**
* Usbtokens
*/
Route::get('/usbtokens', [
	'uses' => 'UsbtokenController@index',
	'as' => 'usbtokens',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);

Route::get('/usbtokens/create', [
	'uses' => 'UsbtokenController@create',
	'as' => 'usbtokens.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/usbtokens/{id}', [
	'uses' => 'UsbtokenController@show',
	'as' => 'usbtokens.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor', 'Viewer']
]);



Route::get('/usbtokens/{id}/edit', [
	'uses' => 'UsbtokenController@edit',
	'as' => 'usbtokens.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/usbtokens', [
	'uses' => 'UsbtokenController@store',
	'as' => 'usbtokens.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/usbtokens/{id}', [
	'uses' => 'UsbtokenController@update',
	'as' => 'usbtokens.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);


/**
* Personal phones
*/
Route::get('/personalphones', [
	'uses' => 'PersonalphoneController@index',
	'as' => 'personalphones',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/personalphones/create', [
	'uses' => 'PersonalphoneController@create',
	'as' => 'personalphones.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/personalphones/{id}', [
	'uses' => 'PersonalphoneController@show',
	'as' => 'personalphones.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/personalphones/{id}/edit', [
	'uses' => 'PersonalphoneController@edit',
	'as' => 'personalphones.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/personalphones', [
	'uses' => 'PersonalphoneController@store',
	'as' => 'personalphones.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/personalphones/{id}', [
	'uses' => 'PersonalphoneController@update',
	'as' => 'personalphones.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

/**
* Authorizations
*/
Route::get('/authorizations', [
	'uses' => 'AuthorizationController@index',
	'as' => 'authorizations',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/authorizations/create', [
	'uses' => 'AuthorizationController@create',
	'as' => 'authorizations.create',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/authorizations/{id}', [
	'uses' => 'AuthorizationController@show',
	'as' => 'authorizations.show',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::get('/authorizations/{id}/edit', [
	'uses' => 'AuthorizationController@edit',
	'as' => 'authorizations.edit',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/authorizations', [
	'uses' => 'AuthorizationController@store',
	'as' => 'authorizations.store',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/authorizations/{id}', [
	'uses' => 'AuthorizationController@update',
	'as' => 'authorizations.update',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);


/**
* Altele
*/


Route::get('/partials/structure', [
	'uses' => 'PartialsController@structure',
	'as' => 'partials.structure',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

Route::post('/ajax/keyup', [
	'uses' => 'AjaxController@keyup',
	'as' => 'ajax.keyup',
	'middleware' => 'roles',
	'roles' => ['Admin', 'Editor']
]);

