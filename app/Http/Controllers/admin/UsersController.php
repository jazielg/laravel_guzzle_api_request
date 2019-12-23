<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
        $response = $client->request('GET', 'posts');
        dd(json_decode((string)$response->getBody(), true));
    }

    public function getUsers() {

    }
}
