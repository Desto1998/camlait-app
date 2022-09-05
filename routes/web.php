<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BtController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\DiController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AccountValidation;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\LicenceCheck;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');
Route::get('dologout', [LoginController::class, 'doLogout']);
Route::post('update/pwd', [ForgotPasswordController::class, 'ResetPassword'])->name('update.password');
Route::post('send/reserPassword/link', [ForgotPasswordController::class, 'sendResetPasswordLink'])->name('send.reset.link');
Route::get('resetPassword/infos/{_token}/{email}/{date}', [ForgotPasswordController::class, 'ResetPasswordInfo'])->name('reset.password.data');
Route::view('/privacy-term', 'privacy-term')->name('privacy.term');

Auth::routes();


//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/text', [HomeController::class, 'text'])->name('text');

//Route::get('dashboard/validate/{id}', [RegisterController::class, 'validateAcount'])->name('account.validate');
Route::get('/home', function () {
    return redirect()->route('home');
});
Route::prefix('dashboard')->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::group(['middleware' => 'auth'], function () {

        //Route for user only for active user with valid licence
        Route::middleware([AccountValidation::class, LicenceCheck::class])->group(function () {
            Route::get('home', [HomeController::class, 'index'])->name('home');

            //Route for for profile account
            Route::get('user/profile', [UserController::class, 'showProfile'])->name('user.profile');
            Route::post('user/updateInfos', [UserController::class, 'updateInfos'])->name('user.edit.infos');
            Route::post('user/updatepassword', [UserController::class, 'updatePassword'])->name('user.edit.password');
            Route::post('user/profile/image', [UserController::class, 'UpdateImage'])->name('user.profil.image');

            // Route for charges
            Route::get('gestion/charges', [GestionController::class, 'charge'])->name('gestion.index');
            Route::get('gestion/charges/load', [GestionController::class, 'loadCharges'])->name('gestion.load.charge');
            Route::post('gestion/charges/add', [GestionController::class, 'storeCharge'])->name('gestion.charge.add');
            Route::post('gestion/charges/delete', [GestionController::class, 'deleteCharge'])->name('gestion.charge.delete');


            // Route for taches
            Route::get('gestion/tasks', [GestionController::class, 'taches'])->name('gestion.tache');
            Route::get('gestion/tasks/load', [GestionController::class, 'loadTaches'])->name('gestion.load.tache');
            Route::post('gestion/tasks/add', [GestionController::class, 'storeTask'])->name('gestion.taches.add');
            Route::post('gestion/tasks/markasdone', [GestionController::class, 'markTaskAsDone'])->name('gestion.taches.markasdone');
            Route::post('gestion/tasks/delete', [GestionController::class, 'deleteTache'])->name('gestion.taches.delete');

            // Route for caisse
            Route::get('gestion/caisses', [CaisseController::class, 'index'])->name('gestion.caisses');
            Route::get('gestion/caisses/load', [CaisseController::class, 'loadCaisses'])->name('gestion.load.caisse');

            Route::post('gestion/calendar', [UserController::class, 'UpdateImage'])->name('gestion.calendrier');
            //Route for rapport
            Route::get('rapport/charge', [RapportController::class, 'showChargeForm'])->name('rapport.charge');
            Route::get('rapport/charge/print', [RapportController::class, 'printCharge'])->name('rapport.charge.print');

            //load notification
            Route::view('/notification', 'notify')->name('notify.all');


            Route::resource('personnel', \App\Http\Controllers\PersonnelsController::class);
            Route::resource('equipement', \App\Http\Controllers\EquipementsController::class);

            Route::post('personnel/delete', [\App\Http\Controllers\PersonnelsController::class, 'delete'])->name('personnel.delete');
            Route::post('equipement/delete', [\App\Http\Controllers\EquipementsController::class, 'delete'])->name('equipement.delete');

//            Route pour DI
            Route::get('di/index', [DiController::class, 'index'])->name('di.index');
            Route::get('di/create', [DiController::class, 'create'])->name('di.create');
            Route::get('di/details/{id}', [DiController::class, 'show'])->name('di.show');
            Route::post('di/store', [DiController::class, 'store'])->name('di.store');
            Route::get('di/edit/{id}', [DiController::class, 'edit'])->name('di.edit');
            Route::post('di/update', [DiController::class, 'update'])->name('di.update');
            Route::post('di/delete', [DiController::class, 'delete'])->name('di.delete');

            //            Route pour TB
            Route::get('bt/index', [BtController::class, 'index'])->name('bt.index');
            Route::get('bt/create', [BtController::class, 'create'])->name('bt.create');
            Route::get('bt/details/{id}', [BtController::class, 'show'])->name('bt.show');
            Route::post('bt/store', [BtController::class, 'store'])->name('bt.store');
            Route::get('bt/edit/{id}', [BtController::class, 'edit'])->name('bt.edit');
            Route::post('bt/update', [BtController::class, 'update'])->name('bt.update');
            Route::post('bt/delete', [BtController::class, 'delete'])->name('bt.delete');

       //            Route pour Fiche activite
            Route::get('active/index', [InterController::class, 'index'])->name('activite.index');
            Route::get('active/create', [InterController::class, 'create'])->name('activite.create');
            Route::get('active/details/{id}', [InterController::class, 'show'])->name('activite.show');
            Route::post('active/store', [InterController::class, 'store'])->name('activite.store');
            Route::get('active/edit/{id}', [InterController::class, 'edit'])->name('activite.edit');
            Route::post('active/update', [InterController::class, 'update'])->name('activite.update');
            Route::post('active/delete', [InterController::class, 'delete'])->name('activite.delete');
            Route::get('active/print/{id}', [InterController::class, 'print'])->name('activite.print');


            //Route for admin prefix with admin depend on  middleware to allow only admin
            Route::prefix('admin')->group(function () {
                Route::middleware([CheckAdmin::class])->group(function () {
                    // routes pour les compte utilisateurs
                    Route::get('user/all', [UserController::class, 'index'])->name('user.all');
                    Route::view('user/new', 'user.add')->name('user.add');
                    Route::post('user/new/store', [UserController::class, 'storeUser'])->name('user.add.store');
                    Route::get('user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
                    Route::post('user/edit/store', [UserController::class, 'updateUser'])->name('user.edit.store');
                    Route::post('user/delete', [UserController::class, 'deleteUser'])->name('user.delete');
                    Route::get('user/activate/{id}', [UserController::class, 'activate'])->name('activate_compte');
                    Route::get('user/block/{id}', [UserController::class, 'block'])->name('block_compte');
                });
            });


        });

    });

});
Route::get('clear', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});
