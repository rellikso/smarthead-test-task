<?php

use App\Livewire\TicketWidget;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/widget', TicketWidget::class)->name('widget');
