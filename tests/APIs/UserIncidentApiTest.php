<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UserIncident;

class UserIncidentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_user_incident()
    {
        $userIncident = factory(UserIncident::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user_incidents', $userIncident
        );

        $this->assertApiResponse($userIncident);
    }

    /**
     * @test
     */
    public function test_read_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/user_incidents/'.$userIncident->id
        );

        $this->assertApiResponse($userIncident->toArray());
    }

    /**
     * @test
     */
    public function test_update_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();
        $editedUserIncident = factory(UserIncident::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user_incidents/'.$userIncident->id,
            $editedUserIncident
        );

        $this->assertApiResponse($editedUserIncident);
    }

    /**
     * @test
     */
    public function test_delete_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user_incidents/'.$userIncident->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user_incidents/'.$userIncident->id
        );

        $this->response->assertStatus(404);
    }
}
