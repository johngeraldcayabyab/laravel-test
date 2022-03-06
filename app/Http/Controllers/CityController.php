<?php

namespace App\Http\Controllers;

use App\Data\Cities;

class CityController
{
    public function index()
    {
        return response()->json(Cities::getCities());
    }
}
