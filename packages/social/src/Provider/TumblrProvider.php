<?php

namespace Cornatul\Social\Providers;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

class TumblrProvider extends AbstractProvider
{

    public function getName()
    {
        return 'tumblr';
    }

    public function getBaseAuthorizationUrl()
    {
        // TODO: Implement getBaseAuthorizationUrl() method.
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        // TODO: Implement getBaseAccessTokenUrl() method.
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        // TODO: Implement getResourceOwnerDetailsUrl() method.
    }

    protected function getDefaultScopes()
    {
        // TODO: Implement getDefaultScopes() method.
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        // TODO: Implement checkResponse() method.
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        // TODO: Implement createResourceOwner() method.
    }
}
