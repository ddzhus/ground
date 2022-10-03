<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);
    }

    public function testQueue()
    {
        $response = $this->get(route('queue'));
        $response->assertStatus(200);
    }

    public function testDatabase()
    {
        $response = $this->get(route('database'));

        $response->assertStatus(200);
    }
}
