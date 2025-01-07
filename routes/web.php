<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\SubscriptionForm as LivewireSubscriptionForm ;
use App\Livewire\SubscriptionCrud as LivewireSubscriptionCrud;
use App\Livewire\SubscriptionTable as LivewireSubscriptionTable;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscriptions', LivewireSubscriptionCrud::class)->name('subscriptions.index'); 
Route::get('/subscriptions-table', LivewireSubscriptionTable::class);
Route::get('/subscriptions/create', LivewireSubscriptionForm::class)->name('subscriptions.create');
Route::get('/subscriptions/{id}/edit', LivewireSubscriptionForm::class)->name('subscriptions.edit');