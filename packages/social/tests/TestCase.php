<?php

namespace Cornatul\Social\Tests;
use Cornatul\Social\SocialServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    final protected function getPackageProviders($app)
    {
        return [
            SocialServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
