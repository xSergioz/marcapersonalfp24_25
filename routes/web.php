<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Models\Ciclo;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

include __DIR__.'/docentes.php';
include __DIR__.'/actividades.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';

require __DIR__.'/auth.php';

Route::get('pruebaDB', function () {
    $count = Ciclo::where('id', '>', 93)->count();
    echo 'Antes: ' . $count . '<br />';

    $ciclo = new Ciclo;
    $ciclo->nombre = 'Técnico Superior en Desarrollo d eAplicaciones Laravel';
    $ciclo->codCiclo = 'DAPL3';
    $ciclo->codFamilia = 'IFC';
    $ciclo->grado = 'G.S.';
    $ciclo->save();

    $count = Ciclo::where('id', '>', 93)->count();
    echo 'Después: ' . $count . '<br />';
});
