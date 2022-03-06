<?php

namespace App\Console\Commands;

use App\Service\WeatherForecast;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GetWeatherForecastConsole extends Command
{
    protected $signature = 'weather:get {cities}';
    protected $description = 'Get weather forecast of multiple cities using comma as a delimiter';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $cities = explode(',', $this->argument('cities'));
        foreach ($cities as $city) {
            $this->getFiveDaysCityForecast($city);
        }
        return 0;
    }

    public function getFiveDaysCityForecast($city)
    {
        $headers = ['City'];
        $weatherForecast = new WeatherForecast();
        $cityWeatherForecasts = $weatherForecast->getForecastWeatherByCityName($city);
        $location = $cityWeatherForecasts['location'];
        $forecasts = $cityWeatherForecasts['forecast'];
        $days = ['City' => $location['name']];
        foreach ($forecasts as $forecast) {
            $forecastInTime = '';
            $datetime = $forecast['datetime'];
            $condition = $forecast['condition'];
            $forecast = $forecast['forecast'];
            $day = $datetime['formatted_day'];
            $conditionDesc = Str::title($condition['name']);
            $forecastInTime .= "{$datetime['formatted_time']}\n{$conditionDesc}\nTemp: {$forecast['temp']}K\nPressure: {$forecast['pressure']}K\nHumidity: ${forecast['humidity']}%.";
            $headers[] = $day;
            $days[$day][] = $forecastInTime;
        }
        $headers = array_unique($headers);
        foreach ($days as $day => $forecasts) {
            if ($day === 'City') {
                continue;
            }
            $merged = '';
            foreach ($forecasts as $forecast) {
                $merged = "{$forecast}\n";
            }
            $days[$day] = $merged;
        }
        $this->table(
            $headers,
            [$days]
        );
    }
}




