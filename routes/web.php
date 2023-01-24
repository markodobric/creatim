<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\LegalEntityController;
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

Route::redirect('/', '/legal-entities');

Route::prefix('/legal-entities')->group(function () {
    Route::get('', [LegalEntityController::class, 'index'])->name('legal_entities.index');
    Route::get('/create', [LegalEntityController::class, 'create'])->name('legal_entities.create');
    Route::get('/{legal_entity}', [LegalEntityController::class, 'show'])->name('legal_entities.show');
    Route::get('/{legal_entity}/edit', [LegalEntityController::class, 'edit'])->name('legal_entities.edit');
    Route::post('/store', [LegalEntityController::class, 'store'])->name('legal_entities.store');
    Route::post('/{legal_entity}', [LegalEntityController::class, 'update'])->name('legal_entities.update');
    Route::get('/{legal_entity}/delete', [LegalEntityController::class, 'delete'])->name('legal_entities.delete');
});

Route::prefix('/individuals')->group(function () {
    Route::get('', [IndividualController::class, 'index'])->name('individuals.index');
    Route::get('/create', [IndividualController::class, 'create'])->name('individuals.create');
    Route::get('/{individual}', [IndividualController::class, 'show'])->name('individuals.show');
    Route::get('/{individual}/edit', [IndividualController::class, 'edit'])->name('individuals.edit');
    Route::post('/store', [IndividualController::class, 'store'])->name('individuals.store');
    Route::post('/{individual}', [IndividualController::class, 'update'])->name('individuals.update');
    Route::get('/{individual}/delete', [IndividualController::class, 'delete'])->name('individuals.delete');
});

Route::prefix('/groups')->group(function () {
    Route::post('/store', [GroupController::class, 'store'])->name('groups.store');
});
