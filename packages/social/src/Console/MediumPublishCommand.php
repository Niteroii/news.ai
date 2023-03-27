<?php
declare(strict_types=1);
namespace Cornatul\Social\Console;

use Cornatul\Feeds\Connectors\FeedlyConnector;
use Cornatul\Feeds\Connectors\NlpConnector;
use Cornatul\Feeds\Requests\FeedlyTopicRequest;
use Cornatul\Feeds\Requests\GetArticleRequest;
use Cornatul\Social\Service\MediumService;
use Illuminate\Console\Command;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;

class MediumPublishCommand extends Command
{

    protected $signature = 'medium:publish';

    protected $description = 'Publish to medium a post';

    /**
     * @throws \ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws \JsonException
     */
    public function handle(): void
    {
        $medium = new MediumService();
        $response = $medium->shareOnWall('test');
        dd($response);
    }

}
