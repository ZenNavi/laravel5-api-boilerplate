<?php

use App\Http\Controllers\DepartmentController;
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

/*
 * Welcome route - link to any public API documentation here
 */
Route::get('/', function () {
    echo 'Welcome to our API';
});

Route::post('/login', 'Auth\AuthController@login');

Route::post('/attachment/upload', 'AttachmentController@upload');
Route::get('/attachment/download/{id}', 'AttachmentController@download');

/**
 * @var $api \Dingo\Api\Routing\Router
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => ['api']], function ($api) {

    /*
     * Authentication
     */
    $api->group(['prefix' => 'auth'], function ($api) {
        $api->group(['prefix' => 'jwt'], function ($api) {
            $api->get('/token', 'App\Http\Controllers\Auth\AuthController@token');
        });
    });

    /*
     * Authenticated routes
     */
    $api->group(['middleware' => ['api.auth']], function ($api) {
        /*
         * Authentication
         */
        $api->group(['prefix' => 'auth'], function ($api) {
            $api->group(['prefix' => 'jwt'], function ($api) {
                $api->get('/refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
                $api->delete('/token', 'App\Http\Controllers\Auth\AuthController@logout');
            });

            $api->get('/me', 'App\Http\Controllers\Auth\AuthController@getUser');
        });

        /*
         * Users
         */
        $api->group(['prefix' => 'users', 'middleware' => 'check_role:admin'], function ($api) {
            $api->get('/', 'App\Http\Controllers\UserController@getAll');
            $api->get('/{uuid}', 'App\Http\Controllers\UserController@get');
            $api->post('/', 'App\Http\Controllers\UserController@post');
            $api->put('/{uuid}', 'App\Http\Controllers\UserController@put');
            $api->patch('/{uuid}', 'App\Http\Controllers\UserController@patch');
            $api->delete('/{uuid}', 'App\Http\Controllers\UserController@delete');
        });

        /*
         * Roles
         */
        $api->group(['prefix' => 'roles'], function ($api) {
            $api->get('/', 'App\Http\Controllers\RoleController@getAll');
        });

        /*
         * Departments
         */
        $api->group(['prefix' => 'department'], function($api){
            $api->get('/', 'App\Http\Controllers\DepartmentController@getAll');
            $api->get('/{id}', 'App\Http\Controllers\DepartmentController@get');
            $api->post('/{id?}', 'App\Http\Controllers\DepartmentController@post');
            $api->put('/{id}', 'App\Http\Controllers\DepartmentController@put');
            $api->patch('/{id}', 'App\Http\Controllers\DepartmentController@patch');
            $api->delete('/{id}', 'App\Http\Controllers\DepartmentController@delete');
        });

        /*
         * Evaluations
         */
        $api->group(['prefix' => 'evaluation'], function($api){
            $api->get('/', 'App\Http\Controllers\EvaluationController@getAll');
            $api->get('/{id}', 'App\Http\Controllers\EvaluationController@get');
            $api->post('/{id?}', 'App\Http\Controllers\EvaluationController@post');
            $api->put('/{id}', 'App\Http\Controllers\EvaluationController@put');
            $api->patch('/{id}', 'App\Http\Controllers\EvaluationController@patch');
            $api->delete('/{id}', 'App\Http\Controllers\EvaluationController@delete');
        });

        /*
         * Staff
         */
        $api->group(['prefix' => 'staff'], function($api){
            $api->get('/', 'App\Http\Controllers\StaffController@getAll');
            $api->get('/{id}', 'App\Http\Controllers\StaffController@get');
            $api->post('/{id?}', 'App\Http\Controllers\StaffController@post');
            $api->put('/{id}', 'App\Http\Controllers\StaffController@put');
            $api->patch('/{id}', 'App\Http\Controllers\StaffController@patch');
            $api->delete('/{id}', 'App\Http\Controllers\StaffController@delete');
        });

        $api->group(['prefix' => 'attachment'], function($api){
            $api->post('/upload', 'App\Http\Controllers\AttachmentController@upload');
            $api->get('/download/{id}', 'App\Http\Controllers\AttachmentController@download');
        });

    });
});
