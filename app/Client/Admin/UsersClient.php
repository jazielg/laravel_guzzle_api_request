<?php

namespace App\Client\Admin;

use App\Client\BaseClient;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class UsersClient extends BaseClient
{
    public function getUsers()
    {
        $request = $this->getClient()->request('POST', 'user/select');
        return $this->getResult($request);
    }
}
