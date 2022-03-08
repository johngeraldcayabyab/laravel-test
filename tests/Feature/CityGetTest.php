<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityGetTest extends TestCase
{
    public function testExactSupportedCitiesResponse()
    {
        $response = $this->getJson('/api/cities');
        $response->assertStatus(200);
        $response->assertExactJson([
            "SEOUL",
            "São Paulo",
            "Bombay",
            "JAKARTA",
            "Karachi",
            "MOSKVA",
            "Istanbul",
            "Shanghai",
            "TOKYO",
            "New York",
            "BANGKOK",
            "BEIJING",
            "Delhi",
            "LOND",
            "HongKong",
            "CAIRO",
            "TEHRAN",
            "BOGOTA",
            "Bandung",
            "Tianjin",
            "LIMA",
            "Rio de Janeiro",
            "Lahore",
            "Bogor",
            "SANTIAGO",
            "St Petersburg",
            "Shenyang",
            "Calcutta",
            "Wuhan",
            "Sydney",
            "Guangzhou",
            "SINGAPORE",
            "Madras",
            "BAGHDAD",
            "Pusan",
            "Los Angeles",
            "Yokohama",
            "DHAKA",
            "BERLIN",
            "Alexandria",
            "Bangalore",
            "Malang",
            "Hyderabad",
            "Chongqing",
            "Haerbin",
            "ANKARA",
            "BUENOS AIRES",
            "Chengdu",
            "Ahmedabad",
        ]);
    }
}
