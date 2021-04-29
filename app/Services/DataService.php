<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DataService
{
    private string $apiUrl = 'https://data.cityofchicago.org/resource/ydr8-5enu.json';

    /**
     * Returns data from API.
     *
     * @return array
     */
    public function getData(): array
    {
        return Http::get($this->apiUrl)
            ->throw()
            ->json();
    }
}
