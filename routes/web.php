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
Route::livewire('/', 'users')->section('content')->name('users');
Route::livewire('/users-edit/{id}', 'users-edit')->section('content')->name('users-edit');
Route::livewire('/teams', 'teams')->section('content')->name('teams');
Route::livewire('/teams-edit/{id}', 'teams-edit')->section('content')->name('teams-edit');
Route::livewire('/teams-users', 'teams-users')->section('content')->name('teams-users');
