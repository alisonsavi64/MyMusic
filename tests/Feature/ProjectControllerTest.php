<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_successful_project(): void
    {
        $response = $this->postJson('/api/projects', ['description' => "first project", 'user_id' => 1]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('projects', [
            'description' => 'first project',
            'user_id' => 1
        ]);
    }

    public function test_create__project_missing_description(): void
    {
        $response = $this->postJson('/api/projects', ['user_id' => 1]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('description');
    }

    public function test_create__project_missing_user_id(): void
    {
        $response = $this->postJson('/api/projects', ['description' => "first project"]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrorFor('user_id');
    }

    public function test_find_project_by_id(): void
    {
        $createResponse = $this->postJson('/api/projects', ['description' => 'Test find by id', 'user_id' => 1]);
        $data = $createResponse->json();
        $id = $data['id'];
        $findResponse = $this->get("/api/projects/$id");
        $findResponse->assertStatus(200);
        $findResponse->assertJson($data);
    }

    public function test_get_all_project(): void
    {
        $response = $this->postJson('/api/projects', ['description' => 'Teste', 'user_id' => 1]);
        $response = $this->postJson('/api/projects', ['description' => 'Teste2', 'user_id' => 1]);
        $response = $this->get('/api/projects');
        $response->assertStatus(200);
        $data = $response->json();
        $this->assertEquals(count($data), 2);
    }

    public function test_update_project(): void
    {
        $responseBeforeUpdate = $this->postJson('/api/projects', ['description' => 'Teste', 'user_id' => 1]);

        $id = $responseBeforeUpdate->json()['id'];

        $this->assertDatabaseHas('projects', [
            'id' => $id,
            'description' => 'Teste',
            'user_id' => 1
        ]);

        $updateResponse = $this->put("/api/projects/$id", ['description' => 'Teste Update', 'user_id' => 1]);

        $updateResponse->assertStatus(200);

        $this->assertDatabaseHas('projects', [
            'id' => $id,
            'description' => 'Teste Update',
            'user_id' => 1
        ]);
    }

    public function test_delete_project(): void
    {
        $responseCreate = $this->postJson('/api/projects', ['description' => 'Teste', 'user_id' => 1]);

        $id = $responseCreate->json()['id'];

        $this->assertDatabaseHas('projects', [
            'id' => $id,
            'description' => 'Teste',
            'user_id' => 1
        ]);

        $deleteResponse = $this->delete("/api/projects/$id");

        $deleteResponse->assertStatus(200);

        $this->assertDatabaseMissing('projects', [
            'id' => $id,
            'description' => 'Teste',
            'user_id' => 1
        ]);

    }
}
