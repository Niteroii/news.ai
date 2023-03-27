<?php
declare(strict_types=1);
namespace Cornatul\Social\Service;

use Cornatul\Social\Contracts\ShareContract;
use Cornatul\Social\Objects\Message;
use JonathanTorres\MediumSdk\Medium;
use League\OAuth2\Client\Token\AccessTokenInterface;

class MediumService
{
    public function shareOnWall(Message $message)
    {
        $medium = new Medium();

        $medium->connect(config('social.medium.token'));

        $user = $medium->getAuthenticatedUser();

        $data = [
            'title' => $message->getTitle(),
            'contentFormat' => 'markdown',
            'content' => $message->getBody(),
            'publishStatus' => 'public',
            'tags' => $message->getTags(),
        ];

        return $medium->createPost($user->data->id, $data);

    }
}
