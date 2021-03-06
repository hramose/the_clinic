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

Route::get('/', 'WelcomeController@index');
Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Pacientes
Route::get('pacientes', ['as'=>'pacientes','uses'=>'PatientsController@index']);
Route::get('pacientes/registrar', ['as'=>'crear-pacientes','uses'=>'PatientsController@create']);
//Route::post('pacientes/registrar', ['as'=>'guardar-pacientes','uses'=>'PatientsController@store']);
Route::get('pacientes/seleccion/empresa', ['as'=>'show-companys-patients','uses'=>'PatientsController@companysToAdd']);
Route::get('pacientes/seleccion/titular', ['as'=>'show-incumbents-patients','uses'=>'PatientsController@incumbentsToAdd']);
Route::post('pacientes/guardar',['as'=>'save-incumbents-patients','uses'=>'PatientsController@store']);
Route::get('pacientes/listado', ['as'=>'lista-pacientes','uses'=>'PatientsController@patients_list']);
Route::get('pacientes/lista', ['as'=>'lista-todos-pacientes','uses'=>'PatientsController@listAllPatients']);
Route::get('pacientes/data/{id}',['as'=>'patient-data','uses'=>'PatientsController@dataOfPatient']);
Route::get('pacientes/editar/datos/{id}',['as'=>'patient-edit','uses'=>'PatientsController@edit']);
Route::patch('pacientes/update/{id}',['as'=>'patient-update','uses'=>'PatientsController@update']);
Route::get('pacientes/reservas/futuras/{id}',['as'=>'reservas-paciente','uses'=>'PatientsController@pendingReservations']);
//Empresas
Route::get('empresas', ['as'=>'empresas','uses'=>'CompanyController@index']);
Route::get('empresas/registrar', ['as'=>'crear-empresa','uses'=>'CompanyController@create']);
Route::post('empresas/registrar', ['as'=>'guarda-empresa','uses'=>'CompanyController@store']);
Route::get('empresas/listado', ['as'=>'lista-empresas','uses'=>'CompanyController@companys_list']);
Route::get('empresas/editar/datos/{id}',['as'=>'company-edit','uses'=>'CompanyController@edit']);
Route::patch('empresa/update/{id}',['as'=>'company-update','uses'=>'CompanyController@update']);
//Atenciones
Route::get('atenciones', ['as'=>'atenciones','uses'=>'AtentionController@index']);
Route::get('atenciones/registrar', ['as'=>'crear-atencion','uses'=>'AtentionController@create']);
Route::post('atenciones/registrar', ['as'=>'guarda-atencion','uses'=>'AtentionController@store']);
Route::get('atenciones/listado', ['as'=>'lista-atenciones','uses'=>'AtentionController@atentions_list']);
Route::get('atenciones/lista', ['as'=>'lista-todas-atenciones','uses'=>'AtentionController@listAllAtentions']);
//Profecionales
Route::get('profecionales',['as'=>'profecionales','uses'=>'MedicController@index']);
Route::get('profecionales/registrar',['as'=>'crear-profecional','uses'=>'MedicController@create']);
Route::post('profecionales/registrar',['as'=>'guarda-profecional','uses'=>'MedicController@store']);
Route::get('profecionales/listado',['as'=>'lista-profecionales','uses'=>'MedicController@medics_list']);
Route::get('profecionales/lista', ['as'=>'lista-todos-profecionales','uses'=>'MedicController@listAllMedics']);
//Agenda
Route::get('agenda', ['as'=>'agenda','uses'=>'ShedulleController@index']);
Route::get('agenda/registrar/hora', ['as'=>'registrar-hora','uses'=>'ShedulleController@create']);
Route::post('agenda/registrar/hora', ['as'=>'save-reservation','uses'=>'ShedulleController@store']);
Route::get('agenda/valida/seleccion/{room}/{block}/{year}/{month}/{day}/{atention}/{medic}',['as'=>'datos-hora-seleccionada','uses'=>'ShedulleController@dataSelection']);
Route::get('agenda/datos/tabla/{year}/{month}/{day}/{room}', ['as'=>'info-day-room','uses'=>'ShedulleController@dataOfDayInRoom']);
Route::get('agenda/ver/calendario',['as'=>'ver-calendario','uses'=>'ShedulleController@showCalendar']);
Route::get('agenda/tabla/{year}/{month}/{day}/{room}/{medic}', ['as'=>'info-day-room2','uses'=>'ShedulleController@dataOfDayInRoom2']);
Route::get('reservation/all/data/{id}',['as'=>'all-data-reservation','uses'=>'ReservationController@dataReservation']);
Route::patch('reservation/update/status/{id}',['as'=>'cambia-estado','uses'=>'ReservationController@updateStatus']);
Route::post('reservation/delete/{id}',['as'=>'delete-reservation','uses'=>'ShedulleController@destroy']);
Route::get('agrenda/impresion/dia/{year}/{month}/{day}/{room}',['as'=>'print-day','uses'=>'ShedulleController@printDay']);
//Presupuesto
Route::get('presupuesto',['as'=>'presupuesto','uses'=>'BudgetController@index']);
Route::get('presupuesto/elaborar',['as'=>'crear-presupuesto','uses'=>'BudgetController@create']);
Route::post('presupuesto/save',['as'=>'save-budget','uses'=>'BudgetController@store']);
Route::get('presupuesto/imprimir/{id}',['as'=>'print-budget','uses'=>'BudgetController@printBudget']);
Route::get('presupuesto/lista',['as'=>'budget-list','uses'=>'BudgetController@listOfBudgets']);
Route::get('ver/presupuesto/{id}',['as'=>'show-budget','uses'=>'BudgetController@show']);

Route::post('confirm/budget/{id}',['as'=>'confirm-budget','uses'=>'BudgetController@confirmBudget']);
Route::post('cancel/budget/{id}',['as'=>'cancel-budget','uses'=>'BudgetController@cancelBudget']);

Route::get('/prueba',['as'=>'prueba','uses'=>'ShedulleController@prueba']);

Route::get('/import/companies',['as'=>'import-companies','uses'=>'importDataController@companies']);
