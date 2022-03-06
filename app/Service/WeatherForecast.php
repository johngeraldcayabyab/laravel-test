<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherForecast
{
    private $apiKey = NULL;
    private $apiEndpointForecast = NULL;
    private $apiEndpointIcons = NULL;
    private $apiEndpointIconsExt = NULL;
    private $apiLang = NULL;
    private $formatDate = NULL;
    private $formatTime = NULL;
    private $loggingChannel = 'weather_forecast';

    public function __construct()
    {
        $this->apiKey = config('openweather.api_key');
        $this->apiEndpointForecast = config('openweather.api_endpoint_forecast');
        $this->apiEndpointIcons = config('openweather.api_endpoint_icons');
        $this->apiEndpointIconsExt = config('openweather.api_endpoint_icons_ext');
        $this->apiLang = config('openweather.api_lang');
        $this->formatDate = config('openweather.format_date');
        $this->formatTime = config('openweather.format_time');
        $this->formatDay = config('openweather.format_day');
    }

    private function getRequest(string $url)
    {
        $response = Http::get($url);
        if (!$response) {
            $this->log('OpenWeather - Error fetching response from ' . $url);
            return false;
        }
        return $response;
    }

    private function log($message): void
    {
        Log::channel($this->loggingChannel)->error($message);
    }
}
