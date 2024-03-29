<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FirstTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);
        $this->get("/guests/checkout")->assertStatus(200);
        $this->get("/guests/searchresult")->assertStatus(200);
        $this->get("/guests/create")->assertStatus(200);
    }
}
