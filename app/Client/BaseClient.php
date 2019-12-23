<?php

namespace App\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Session;

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
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRkNDFjY2I4ZTBiZTU0ZWZmYzdkZWQ4MWMzYmY5NmVmOGIwOGVjZmVkOTJlZTkxMzY1NWY3MjMyMTZmYTZhOWYwZWU3ZjUzMzhmNTQ4Zjc3In0.eyJhdWQiOiIxIiwianRpIjoiNGQ0MWNjYjhlMGJlNTRlZmZjN2RlZDgxYzNiZjk2ZWY4YjA4ZWNmZWQ5MmVlOTEzNjU1ZjcyMzIxNmZhNmE5ZjBlZTdmNTMzOGY1NDhmNzciLCJpYXQiOjE1NzcxMTIzNTksIm5iZiI6MTU3NzExMjM1OSwiZXhwIjoxNjA4NzM0NzU5LCJzdWIiOiIxOTAiLCJzY29wZXMiOltdfQ.dUr0BlGfvnbNfPbFxKla7eyZFVwlS0gzSo_fvgerMw1dLFHfxCv2F4NdJKe_kGjkbVgwWYw0VlmxnasLcedLv0Pg_no8CZ31SVrQ-NbQCtRGyf2D7H7CR6rQPzVvneP1ccHuQ-E7xBbNH9R8rarBDZ3M-Pue2WEg7nTiE1YL3BzKww1tA0Yd8RZrl0SkWWUnqQ4D_eM5Z7TXDy3ZeMxNzbGPZ8DW8R1-rM-nh9UWPllgranIl8E6J2_kD0frnWmsII0F5_21azElRgf_kbUJibu30Nu3Yhh4Q9s06i4xlcKfjG-tqemj4dXFBqO7Yu7xgboJI8hvi8YG-3_MfQtMMa1vTesIhdtuK3XP9FmqH0RIBOySL5MP5uNXTYyNhq7RvEBweDpEDpgRRxPuOPIoBmVOa57Axl5AjdC2yk8b59g2c9H7H4ypcxQghT_VXPdwpjH6FgzgLuLj-WnFIrFtlVSKcUCU1Q_Xzw3aPRYm-FPmvyzl4Wlj3ELWR42CA-kgHsOzq59VQU9DFdkGXA_ieN4qT7lkkMHW002JzTDlTPTeRYnpCEZBYa_x5FdFTsOadeyutdvkXxDaDaix0r_Tu0bzxM22c9N8Nqn97sreZgc8-J0QvfNG2N2leD4ojIVvZnTwSvaGg0_u8AetHsXOjWRraIsrHb2rpD2I-L8fawU',
            ]
        ]);
    }

    public function getApiUrl() {
        return env('API_URL');
    }

    public function getToken() {
        return Session::get('token');
    }

    public function getResult($request) {
        $result = json_decode((string)$request->getBody(), true);
        return $result;
    }
}
