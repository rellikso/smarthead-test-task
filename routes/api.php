<?php
use App\Http\Controllers\Api\WidgetController;
use Illuminate\Support\Facades\Route;

Route::post('/widget', [WidgetController::class, 'store'])->name('api.widget.store');
