<?php

namespace Cornatul\Social\Tests\Unit;

use Cornatul\Social\Contracts\ShareContract;
use Cornatul\Social\DTO\TwitterTrendingDTO;
use Mockery;


class SocialTest extends \Cornatul\Social\Tests\TestCase
{


    public function test_can_get_twitter_trends(): void
    {
        $social = Mockery::mock(ShareContract::class);

        $social->shouldReceive('getTwitterTrends')
            ->once()
            ->andReturn(new TwitterTrendingDTO());

        $this->assertInstanceOf(TwitterTrendingDTO::class, $social->getTwitterTrends());
    }

    public function test_can_get_github_trends(): void
    {
        $social = Mockery::mock()->makePartial('Cornatul\Social\Interfaces\SocialInterface');
        $social->expects('getGithubTrends')->andReturns(new TwitterTrendingDTO());
        $this->assertInstanceOf(TwitterTrendingDTO::class, $social->getGithubTrends());
    }

}
