<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class ExampleTest extends IntegrationTest
{
    protected $baseUrl = 'http://localhost:8088/projectx/public';
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->withoutMiddleware();

         $this->visit('/')->see("Laravel");

        //$response->assertStatus(200);
    }
  }
