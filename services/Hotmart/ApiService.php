<?php

namespace Services\Hotmart;

use GuzzleHttp\Client;

class ApiService
{
    public function authenticateApi()
    {
        $client = new Client();
//        $response = $client->request(
//            "POST",
//            HOTMART_API . HOTMART_CLIENTID . '&client_secret=' . HOTMART_CLIENTSECRET, [
//                'headers' => [
//                    'Content-Type: application/json',
//                    'Authorization: Basic' . HOTMART_BASIC
//            ]
//        ]);

        $response = $client->request(
            "POST",
            'https://api-sec-vlc.hotmart.com/security/oauth/token?grant_type=client_credentials&client_id=09929c99-ae56-43be-85e0-74cc90369ba4&client_secret=62548dd3-3898-43e8-bdc7-04b9a696ac10', [
            'headers' => [
                'Content-Type: application/json',
                'Authorization: Basic MDk5MjljOTktYWU1Ni00M2JlLTg1ZTAtNzRjYzkwMzY5YmE0OjYyNTQ4ZGQzLTM4OTgtNDNlOC1iZGM3LTA0YjlhNjk2YWMxMA=='
            ]
        ]);

//        curl --location --request POST 'https://api-sec-vlc.hotmart.com/security/oauth/token?grant_type=client_credentials&client_id=:client_id&client_secret=:client_secret' \
//	--header 'Content-Type: application/json' \
//	--header 'Authorization: Basic :basic'
echo "<pre>";
var_dump($response->getBody());
echo "</pre>";
die;
        $body = $response->getBody();
        return $body;
    }
}