<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Components;
use App\Http\Controllers\Admin\ComponentParents;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
 * Admin Routes
 */

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', function () {
        return view('admin.login');
    });
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [AuthController::class, 'forgot'])->name('forgot');

    Route::middleware('auth')->group(function (){
        Route::get('/', function (){
            return view('admin.index');
        });
        Route::resource('component-parents', ComponentParents::class);
        Route::resource('components', Components::class);
    });

});
