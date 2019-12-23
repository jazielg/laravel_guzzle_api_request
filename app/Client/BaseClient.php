<?php

namespace App\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class BaseClient
{
    protected $client;

    public function getClient()
    {
        return new Client([
            'base_uri' => $this->getApiUrl(),
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getToken(),
            ]
        ]);
    }

    public function getApiUrl() {
        return env('API_URL');
    }

    public function getToken() {
        return session()->get('token');
    }

    public function getResult($request) {
        $result = json_decode((string)$request->getBody(), true);
        return $result;
    }
}
