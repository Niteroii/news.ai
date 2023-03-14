<?php

namespace Tests\Feature\Feed;

use Tests\TestCase;



class FeedTest extends TestCase
{



    public function testFeedRouteExists()
    {
        $response = $this->get('/feeds');
        $response->assertStatus(200);
    }

}
