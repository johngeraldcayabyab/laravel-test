<?php

namespace App\Console\Commands;

use App\Service\WeatherForecast;
use Illuminate\Console\Command;

class GetWeatherForecast extends Command
{
    protected $signature = 'weather:get';
    protected $description = 'Get weather forecast of multiple cities using comma as a delimiter';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $weatherForecast = new WeatherForecast();
        info($weatherForecast->getForecastWeatherByCityName('Boston'));
        return 0;
    }
}
