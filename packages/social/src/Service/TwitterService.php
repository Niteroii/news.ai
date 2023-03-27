<?php
declare(strict_types=1);

namespace Cornatul\Social\Service;

use Atymic\Twitter\Facade\Twitter;
use Cornatul\Social\Contracts\ShareContract;
use GuzzleHttp\Client;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessTokenInterface;




/**
 * @todo get this to work with a contract
 */
class TwitterService
{

    /**
     * @throws \Exception
     */
    public function shareOnWall(string $message)
    {
        return Twitter::postTweet(['status' => $message, 'response_format' => 'json']);
    }
}
