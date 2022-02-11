<?php

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

Route::middleware(['web','auth:sanctum', 'verified'])
->group(function(){
    \App\ComponentParser::generateRoute(app_path('Http/Livewire/Paginas'));
});



Route::get('/dashboard', function(){
    return redirect()->route('dashboard');
})->name('admin.dashboard');

//Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', \App\Http\Livewire\Admin\DashboardComponent::class)->name('dashboard');


