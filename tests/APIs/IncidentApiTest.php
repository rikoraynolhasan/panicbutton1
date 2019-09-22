<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Incident;

class IncidentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_incident()
    {
        $incident = factory(Incident::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/incidents', $incident
        );

        $this->assertApiResponse($incident);
    }

    /**
     * @test
     */
    public function test_read_incident()
    {
        $incident = factory(Incident::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/incidents/'.$incident->id
        );

        $this->assertApiResponse($incident->toArray());
    }

    /**
     * @test
     */
    public function test_update_incident()
    {
        $incident = factory(Incident::class)->create();
        $editedIncident = factory(Incident::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/incidents/'.$incident->id,
            $editedIncident
        );

        $this->assertApiResponse($editedIncident);
    }

    /**
     * @test
     */
    public function test_delete_incident()
    {
        $incident = factory(Incident::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/incidents/'.$incident->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/incidents/'.$incident->id
        );

        $this->response->assertStatus(404);
    }
}
