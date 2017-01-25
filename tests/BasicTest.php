<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{

    public function testGet()
    {
        $result = IP2LocationLaravel::get('8.8.8.8');
        $this->assertEquals($result['countryCode'], 'US');
    }

}
