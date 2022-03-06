<?php
return [
    'api_key' => env('OPENWEATHER_API_KEY'), //safe
    'api_endpoint_forecast' => 'https://api.openweathermap.org/data/2.5/forecast?', //safe
    'api_endpoint_icons' => 'https://openweathermap.org/img/w/', //safe
    'api_endpoint_icons_ext' => 'png', //safe
    'api_lang' => env('OPENWEATHER_API_LANG', 'en'), //safe
    'format_date' => env('OPENWEATHER_API_DATE_FORMAT', 'm/d/Y'), //safe
    'format_time' => env('OPENWEATHER_API_TIME_FORMAT', 'h:i A'), //safe
    'format_day' => env('OPENWEATHER_API_DAY_FORMAT', 'l') //safe
];
