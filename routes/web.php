<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SubscriptionForm as LivewireSubscriptionForm;
use App\Livewire\UsersTable as LivewireUsersTable;
use App\Livewire\UsersCrud as LivewireUsersCrud;
use App\Livewire\SubscriptionCrud as LivewireSubscriptionCrud;
use App\Livewire\SubscriptionTable as LivewireSubscriptionTable;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/subscriptions', LivewireSubscriptionCrud::class)->name('subscriptions.index');
Route::get('/subscriptions-table', LivewireSubscriptionTable::class)->name('subscriptions.table');
Route::get('/subscriptions/create', LivewireSubscriptionForm::class)->name('subscriptions.create');
Route::get('/users-table', LivewireUsersTable::class)->name('users.table');
Route::get('/users-crud', LivewireUsersCrud::class)->name('users.crud');
Route::get('/subscriptions/{id}/edit', LivewireSubscriptionForm::class)->name('subscriptions.edit');
require __DIR__ . '/auth.php';
