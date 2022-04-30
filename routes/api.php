<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('component/{parent}/{lang}', function ($parent, $lang){
    $component = \App\Models\Component::where('parent_id', '=', $parent)->get();

    foreach ($component as $con){
        $cc = $con->translate($lang);
        $properties = $cc->properties;
        print_r($cc->title.PHP_EOL);
    }
});
