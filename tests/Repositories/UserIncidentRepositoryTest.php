<?php namespace Tests\Repositories;

use App\Models\UserIncident;
use App\Repositories\UserIncidentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UserIncidentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserIncidentRepository
     */
    protected $userIncidentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->userIncidentRepo = \App::make(UserIncidentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_user_incident()
    {
        $userIncident = factory(UserIncident::class)->make()->toArray();

        $createdUserIncident = $this->userIncidentRepo->create($userIncident);

        $createdUserIncident = $createdUserIncident->toArray();
        $this->assertArrayHasKey('id', $createdUserIncident);
        $this->assertNotNull($createdUserIncident['id'], 'Created UserIncident must have id specified');
        $this->assertNotNull(UserIncident::find($createdUserIncident['id']), 'UserIncident with given id must be in DB');
        $this->assertModelData($userIncident, $createdUserIncident);
    }

    /**
     * @test read
     */
    public function test_read_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();

        $dbUserIncident = $this->userIncidentRepo->find($userIncident->id);

        $dbUserIncident = $dbUserIncident->toArray();
        $this->assertModelData($userIncident->toArray(), $dbUserIncident);
    }

    /**
     * @test update
     */
    public function test_update_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();
        $fakeUserIncident = factory(UserIncident::class)->make()->toArray();

        $updatedUserIncident = $this->userIncidentRepo->update($fakeUserIncident, $userIncident->id);

        $this->assertModelData($fakeUserIncident, $updatedUserIncident->toArray());
        $dbUserIncident = $this->userIncidentRepo->find($userIncident->id);
        $this->assertModelData($fakeUserIncident, $dbUserIncident->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_user_incident()
    {
        $userIncident = factory(UserIncident::class)->create();

        $resp = $this->userIncidentRepo->delete($userIncident->id);

        $this->assertTrue($resp);
        $this->assertNull(UserIncident::find($userIncident->id), 'UserIncident should not exist in DB');
    }
}
