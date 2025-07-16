<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClipControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_successful_clip(): void
    {
        $response = $this->postJson('/clip', ['track' => 1, ]);

        $response->assertStatus(200);
    }
}
