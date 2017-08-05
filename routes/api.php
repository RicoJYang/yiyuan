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
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['namespace' => 'App\Http\Controllers\Admin'], function ($api) {

    $api->group(['middleware' => [/*'api.admin.auth'*/]], function ($api) {
        //客户管理
        $api->get('customers', 'CustomerController@index');
        $api->get('customer/all', 'CustomerController@all');
        $api->post('customers', 'CustomerController@store');
        $api->put('customers/{id}', 'CustomerController@update');

        //品种
        $api->get('varieties', 'VarietyController@all');

        //合同管理
        $api->get('contracts', 'CustomerController@index');
        $api->get('customers/{id}', 'CustomerController@show');
        $api->post('contracts', 'CustomerController@store');
        $api->put('contracts/{id}', 'CustomerController@update');

        $api->post('admin', 'AdminController@create');
        $api->put('admin/{id}', 'AdminController@update');
        $api->put('admin/{id}/pwd', 'AdminController@updatePwd');

    });
    $api->post('login', 'AdminController@login');

});