<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    /**
     * Refuse to boot tests against anything but SQLite.
     *
     * Runs before setUpTraits(), so a test using RefreshDatabase can never
     * migrate:fresh a real connection (a cached config overrides phpunit.xml).
     */
    protected function refreshApplication(): void
    {
        parent::refreshApplication();

        $connection = config('database.default');

        if (config("database.connections.{$connection}.driver") !== 'sqlite') {
            throw new RuntimeException(
                "Refusing to run tests against the [{$connection}] connection. ".
                'Run `php artisan config:clear` first: a cached configuration overrides the sqlite settings in phpunit.xml.'
            );
        }
    }
}
