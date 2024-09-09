<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class CivicPlusAPI
{
    private string $authUrl = 'api/Auth';

    public function __construct(private Client $client)
    {
        try {
            $tempClient = new Client([
                'base_uri' => $_ENV['CIVICPLUS_BASE_URL'],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ]
            ]);

            $response = $tempClient->post($this->authUrl, [
                'json' => [
                    'clientId' => $_ENV['CIVICPLUS_CLIENT_ID'],
                    'clientSecret' => $_ENV['CIVICPLUS_CLIENT_SECRET'],
                ]
            ]);

            $data = json_decode((string)$response->getBody(), true);

            $this->client = new Client([
                'base_uri' => $_ENV['CIVICPLUS_BASE_URL'],
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $data['access_token'],
                ]
            ]);
        } catch (GuzzleException $e) {
            die($e->getMessage());
        }
    }

    public function get(string $url, array $params = []): array
    {
        try {
            $response = $this->client->get($url, [
                'query' => $params
            ]);

            return json_decode($response->getBody()->getContents(), true) ?? [];

        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function post(string $url, array $data)
    {
        try {
            $response = $this->client->post($url, [
                'json' => $data
            ]);

            if ($response->getStatusCode() === 201) {
                return json_decode($response->getBody()->getContents(), true);
            }

            return ['error' => (string)$response->getBody()];
        } catch (ClientException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}