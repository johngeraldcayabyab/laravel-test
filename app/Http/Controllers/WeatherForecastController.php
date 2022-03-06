<?php

namespace App\Http\Controllers;

use App\Service\WeatherForecast;

class WeatherForecastController
{
    public function show($city)
    {
        $weatherForecast = new WeatherForecast();
        $cityWeatherForecasts = $weatherForecast->getForecastWeatherByCityName($city);
        return response()->json($cityWeatherForecasts);
    }
}
