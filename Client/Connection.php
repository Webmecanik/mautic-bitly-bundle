<?php

declare(strict_types=1);

namespace MauticPlugin\MauticBitlyBundle\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MauticPlugin\MauticBitlyBundle\Integration\Config;

class Connection
{
    const BITLY_API = 'https://api-ssl.bitly.com/v4/';

    private Client $client;

    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getClient(): Client
    {
        if (!isset($this->client)) {
            $this->client = new Client([
                'base_uri' => self::BITLY_API,
                'headers'  => [
                    'Authorization' => "Bearer {$this->config->getAcccessToken()}",
                ],
            ]);
        }

        return $this->client;
    }

    /**
     * @throws GuzzleException
     */
    public function shortenUrl(string $url): \Psr\Http\Message\ResponseInterface
    {
        $response = $this->client->post('shorten', [
            'json' => [
                'long_url' => $url,
            ],
        ]);

        return $response;
    }

    public function isValidAccessToken(): bool
    {
        try {
            $response = $this->getClient()->get('user');

            return 200 === $response->getStatusCode();
        } catch (\Exception|GuzzleException $e) {
            return false;
        }
    }

    public function isEnabled(): bool
    {
        return $this->config->isPublished() && $this->config->isConfigured();
    }
}
