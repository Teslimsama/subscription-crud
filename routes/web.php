<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\SubscriptionCrud as LivewireSubscriptionCrud;
use App\Livewire\SubscriptionTable as LivewireSubscriptionTable;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscriptions', LivewireSubscriptionCrud::class); 
Route::get('/subscriptions-table', LivewireSubscriptionTable::class);