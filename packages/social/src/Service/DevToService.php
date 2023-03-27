<?php
declare(strict_types=1);
namespace Cornatul\Social\Service;

use Cornatul\Social\Contracts\ShareContract;
use Cornatul\Social\Objects\Message;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JonathanTorres\MediumSdk\Medium;
use League\OAuth2\Client\Token\AccessTokenInterface;

class DevToService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://dev.to/api/',
            'headers' => [
                "api-key"      => config('social.devto.token'),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function shareOnWall(Message $message)
    {
        $response = $this->client->post('articles',
            [
                'json' => [
                    "article" => [
                        "title"         => $message->getTitle(),
                        "published"     => true,
                        "body_markdown" => $message->getBody() . " created by [Software Developer](https://lzomedia.com) ",
                        "main_image"    => $message->getImage(),
                        "tags"          => [],
                    ]
                ]
            ]
        );
        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }
}
