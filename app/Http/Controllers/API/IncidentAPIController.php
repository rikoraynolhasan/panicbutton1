<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIncidentAPIRequest;
use App\Http\Requests\API\UpdateIncidentAPIRequest;
use App\Models\Incident;
use App\Repositories\IncidentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IncidentController
 * @package App\Http\Controllers\API
 */

class IncidentAPIController extends AppBaseController
{
    /** @var  IncidentRepository */
    private $incidentRepository;

    public function __construct(IncidentRepository $incidentRepo)
    {
        $this->incidentRepository = $incidentRepo;
    }

    /**
     * Display a listing of the Incident.
     * GET|HEAD /incidents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->incidentRepository->pushCriteria(new RequestCriteria($request));
        $this->incidentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $incidents = $this->incidentRepository->all();

        return $this->sendResponse($incidents->toArray(), 'Incidents retrieved successfully');
    }

    /**
     * Store a newly created Incident in storage.
     * POST /incidents
     *
     * @param CreateIncidentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIncidentAPIRequest $request)
    {
        $input = $request->all();

        $incident = $this->incidentRepository->create($input);

        return $this->sendResponse($incident->toArray(), 'Incident saved successfully');
    }

    /**
     * Display the specified Incident.
     * GET|HEAD /incidents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Incident $incident */
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            return $this->sendError('Incident not found');
        }

        return $this->sendResponse($incident->toArray(), 'Incident retrieved successfully');
    }

    /**
     * Update the specified Incident in storage.
     * PUT/PATCH /incidents/{id}
     *
     * @param  int $id
     * @param UpdateIncidentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncidentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Incident $incident */
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            return $this->sendError('Incident not found');
        }

        $incident = $this->incidentRepository->update($input, $id);

        return $this->sendResponse($incident->toArray(), 'Incident updated successfully');
    }

    /**
     * Remove the specified Incident from storage.
     * DELETE /incidents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Incident $incident */
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            return $this->sendError('Incident not found');
        }

        $incident->delete();

        return $this->sendResponse($id, 'Incident deleted successfully');
    }
}
