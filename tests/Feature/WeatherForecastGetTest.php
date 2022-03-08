<?php

namespace Tests\Feature;

use Tests\TestCase;

class WeatherForecastGetTest extends TestCase
{
    public function testGetWeatherForecastStructure()
    {
        $response = $this->getJson('/api/forecast/SEOUL');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'formats' => [
                'lang',
                'date',
                'day',
                'time',
            ],
            'location' => [
                'id',
                'name',
                'country',
                'latitude',
                'longitude',
            ],
            'forecast' => [
                '*' => [
                    'datetime' => [
                        'timestamp',
                        'timestamp_sunrise',
                        'timestamp_sunset',
                        'formatted_date',
                        'formatted_day',
                        'formatted_time',
                        'formatted_sunrise',
                        'formatted_sunset'
                    ],
                    'condition' => [
                        'id',
                        'name',
                        'desc',
                        'icon',
                    ],
                    'wind' => [
                        'speed',
                        'deg',
                    ],
                    'forecast' => [
                        'temp',
                        'temp_min',
                        'temp_max',
                        'pressure',
                        'humidity',
                    ]
                ],
            ],
        ]);
    }
}
