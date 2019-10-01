<?php

/*
|--------------------------------------------------------------------------
| Laravel Roles API Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    'middleware'    => ['auth:api'],
    'as'            => 'laravelroles::',
    'namespace'     => 'bexvibi\LaravelRoles\App\Http\Controllers\Api',
    'prefix'        => 'api',
], function () {
    Route::apiResource('roles-api', 'LaravelRolesApiController');
});
