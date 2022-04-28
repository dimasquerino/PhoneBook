<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function (){
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}/show', [ContactController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.delete');
});

Route::get('/', function () {
    return redirect()->route('contacts.index');
});

require __DIR__.'/auth.php';
