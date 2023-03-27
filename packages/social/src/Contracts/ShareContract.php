<?php

namespace Cornatul\Social\Contracts;

use League\OAuth2\Client\Token\AccessTokenInterface;

interface ShareContract
{
    //@todo change the message to not be a string but a array or a class object
    public function shareOnWall(AccessTokenInterface $accessToken, string $message): void;
}
