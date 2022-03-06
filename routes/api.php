<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherForecastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cities', [CityController::class, 'index'])->name('cities.index');
Route::get('forecast/{city}', [WeatherForecastController::class, 'show'])->name('weather_forecast.show');
