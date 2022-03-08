<?php

namespace Tests\Feature;

use Symfony\Component\Console\Exception\RuntimeException;
use Tests\TestCase;

class WeatherForecastConsoleTest extends TestCase
{
    public function testGetWeatherForecastOfOneCity()
    {
        $this->artisan('weather:get Boston')->assertSuccessful();
    }

    public function testGetWeatherForecastOfMultipleCities()
    {
        $this->artisan('weather:get Boston,Manila,Tokyo,Brisbane')->assertSuccessful();
    }

    public function testGetWeatherForecastIfUnsupportedCityIsProvided()
    {
        $this->artisan('weather:get Ilianaport')->expectsOutput("Ilianaport city is not supported");
    }

    public function testGetWeatherForecastFailIfNoCityArguments()
    {
        $this->expectException(RuntimeException::class);
        $this->artisan('weather:get');
    }
}
