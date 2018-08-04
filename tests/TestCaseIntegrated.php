<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCaseIntegrated extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, ApiEnv;

    public $baseUrl = 'http://localhost'; //todo add env.test

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        // Artisan::call('db:seed');
    }
}
