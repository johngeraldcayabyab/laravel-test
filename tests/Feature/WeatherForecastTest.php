<?php

namespace Tests\Feature;

use App\Service\WeatherForecast;
use Tests\TestCase;

class WeatherForecastTest extends TestCase
{
    public function testGetForecastByCityNameReturnsForecast()
    {
        $weatherForecast = new WeatherForecast();
        $results = $weatherForecast->getForecastWeatherByCityName('Boston');
        $this->assertArrayHasKey('forecast', $results);
    }

    public function testGetForecastByCityNameReturnsBooleanForUnsupportedCities()
    {
        $weatherForecast = new WeatherForecast();
        $results = $weatherForecast->getForecastWeatherByCityName('Ilianaport');
        $this->assertFalse($results);
    }
}
