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

    public function getForecastWeatherByCityName(string $city, string $units = 'imperial')
    {
        return $this->getForecastWeather([
            'q' => $city,
            'units' => $units,
            'lang' => $this->apiLang,
            'appid' => $this->apiKey
        ]);
    }

    private function getForecastWeather(array $params)
    {
        $params = http_build_query($params);
        $request = $this->apiEndpointForecast . $params;
        $response = $this->getRequest($request);
        if (!$response) {
            return FALSE;
        }
        $response = $this->parseForecastResponse($response);
        if (!$response) {
            return FALSE;
        }
//        $response =
        return $response;
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

    private function parseForecastResponse(string $response)
    {
        $responseData = json_decode($response, true);
        if (!isset($responseData['cod']) || $responseData['cod'] != 200) {
            $this->log('OpenWeather - Error parsing forecast response.');
            return false;
        }
        $forecast = [];
        foreach ($responseData['list'] as $item) {
            $forecast[] = [
                'datetime' => [
                    'timestamp' => $item['dt'],
                    'timestamp_sunrise' => $responseData['city']['sunrise'],
                    'timestamp_sunset' => $responseData['city']['sunset'],
                    'formatted_date' => date($this->formatDate, $item['dt']),
                    'formatted_day' => date($this->formatDay, $item['dt']),
                    'formatted_time' => date($this->formatTime, $item['dt']),
                    'formatted_sunrise' => date($this->formatTime, $responseData['city']['sunrise']),
                    'formatted_sunset' => date($this->formatTime, $responseData['city']['sunset']),
                ],
                'condition' => [
                    'id' => $item['weather'][0]['id'],
                    'name' => $item['weather'][0]['main'],
                    'desc' => $item['weather'][0]['description'],
                    'icon' => $this->apiEndpointIcons . $item['weather'][0]['icon'] . '.' . $this->apiEndpointIconsExt,
                ],
                'wind' => [
                    'speed' => $item['wind']['speed'],
                    'deg' => $item['wind']['deg'],
                ],
                'forecast' => [
                    'temp' => round($item['main']['temp']),
                    'temp_min' => round($item['main']['temp_min']),
                    'temp_max' => round($item['main']['temp_max']),
                    'pressure' => round($item['main']['pressure']),
                    'humidity' => round($item['main']['humidity']),
                ]
            ];
        }
        return [
            'formats' => [
                'lang' => $this->apiLang,
                'date' => $this->formatDate,
                'day' => $this->formatDay,
                'time' => $this->formatTime,
            ],
            'location' => [
                'id' => (isset($responseData['city']['id'])) ? $responseData['city']['id'] : 0,
                'name' => $responseData['city']['name'],
                'country' => $responseData['city']['country'],
                'latitude' => $responseData['city']['coord']['lat'],
                'longitude' => $responseData['city']['coord']['lon'],
            ],
            'forecast' => $forecast
        ];
    }

    private function log($message): void
    {
        Log::channel($this->loggingChannel)->error($message);
    }
}
