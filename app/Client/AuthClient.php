<?php

namespace App\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Session;
use App\Client\BaseClient;

class AuthClient extends BaseClient
{

    public function login($request_form)
    {
        $email = $request_form['email'];
        $password = $request_form['password'];

        $credentials = [
            'email' => $email,
            'password' => $password
        ];

        try {
            $clientLogin = new Client();
            $request = $clientLogin->request('POST', $this->getApiUrl() . 'login', [
                'form_params' => $credentials
            ]);

            $result = $this->getResult($request);
            if($result['accessToken']) {
                session()->put('user', $result['user']);
                session()->put('token', $result['accessToken']);
                return true;
            }
            return false;
        } catch(ClientException $e) {
            dd($e);
        }
    }

    public function logout()
    {
        try {
            $request = $this->getClient()->request('GET', 'logout');
            $result = $this->getResult($request);
            session()->flush();
            return true;
        } catch (ClientException $e) {
            return $e;
        }
    }

}
