<?php namespace Tests\Repositories;

use App\Models\Incident;
use App\Repositories\IncidentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IncidentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IncidentRepository
     */
    protected $incidentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->incidentRepo = \App::make(IncidentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_incident()
    {
        $incident = factory(Incident::class)->make()->toArray();

        $createdIncident = $this->incidentRepo->create($incident);

        $createdIncident = $createdIncident->toArray();
        $this->assertArrayHasKey('id', $createdIncident);
        $this->assertNotNull($createdIncident['id'], 'Created Incident must have id specified');
        $this->assertNotNull(Incident::find($createdIncident['id']), 'Incident with given id must be in DB');
        $this->assertModelData($incident, $createdIncident);
    }

    /**
     * @test read
     */
    public function test_read_incident()
    {
        $incident = factory(Incident::class)->create();

        $dbIncident = $this->incidentRepo->find($incident->id);

        $dbIncident = $dbIncident->toArray();
        $this->assertModelData($incident->toArray(), $dbIncident);
    }

    /**
     * @test update
     */
    public function test_update_incident()
    {
        $incident = factory(Incident::class)->create();
        $fakeIncident = factory(Incident::class)->make()->toArray();

        $updatedIncident = $this->incidentRepo->update($fakeIncident, $incident->id);

        $this->assertModelData($fakeIncident, $updatedIncident->toArray());
        $dbIncident = $this->incidentRepo->find($incident->id);
        $this->assertModelData($fakeIncident, $dbIncident->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_incident()
    {
        $incident = factory(Incident::class)->create();

        $resp = $this->incidentRepo->delete($incident->id);

        $this->assertTrue($resp);
        $this->assertNull(Incident::find($incident->id), 'Incident should not exist in DB');
    }
}
