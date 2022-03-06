<?php
return [
    'api_key' => env('OPENWEATHER_API_KEY'),
    'api_endpoint_forecast' => 'https://api.openweathermap.org/data/2.5/forecast?',
    'api_endpoint_icons' => 'https://openweathermap.org/img/w/',
    'api_endpoint_icons_ext' => 'png',
    'api_lang' => env('OPENWEATHER_API_LANG', 'en'),
    'format_date' => env('OPENWEATHER_API_DATE_FORMAT', 'Y-m-d'),
    'format_time' => env('OPENWEATHER_API_TIME_FORMAT', 'H:i:s'),
    'format_day' => env('OPENWEATHER_API_DAY_FORMAT', 'l'),
];
