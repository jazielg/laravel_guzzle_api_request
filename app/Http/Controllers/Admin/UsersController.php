<?php

namespace App\Http\Controllers\Admin;

// use App\Client\Admin\UsersClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function examplePlaceholder()
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
        $response = $client->request('GET', 'posts');
        dd(json_decode((string)$response->getBody(), true));
    }

    public function index() 
    {
        $client = new \App\Client\Admin\UsersClient;
        return $client->getUsers();
    }
}
