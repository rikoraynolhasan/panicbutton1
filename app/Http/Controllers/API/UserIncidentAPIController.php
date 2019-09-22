<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserIncidentAPIRequest;
use App\Http\Requests\API\UpdateUserIncidentAPIRequest;
use App\Models\UserIncident;
use App\Repositories\UserIncidentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserIncidentController
 * @package App\Http\Controllers\API
 */

class UserIncidentAPIController extends AppBaseController
{
    /** @var  UserIncidentRepository */
    private $userIncidentRepository;

    public function __construct(UserIncidentRepository $userIncidentRepo)
    {
        $this->userIncidentRepository = $userIncidentRepo;
    }

    /**
     * Display a listing of the UserIncident.
     * GET|HEAD /userIncidents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userIncidentRepository->pushCriteria(new RequestCriteria($request));
        $this->userIncidentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $userIncidents = $this->userIncidentRepository->all();

        return $this->sendResponse($userIncidents->toArray(), 'User Incidents retrieved successfully');
    }

    /**
     * Store a newly created UserIncident in storage.
     * POST /userIncidents
     *
     * @param CreateUserIncidentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserIncidentAPIRequest $request)
    {
        $input = $request->all();

        $userIncident = $this->userIncidentRepository->create($input);

        return $this->sendResponse($userIncident->toArray(), 'User Incident saved successfully');
    }

    /**
     * Display the specified UserIncident.
     * GET|HEAD /userIncidents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UserIncident $userIncident */
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            return $this->sendError('User Incident not found');
        }

        return $this->sendResponse($userIncident->toArray(), 'User Incident retrieved successfully');
    }

    /**
     * Update the specified UserIncident in storage.
     * PUT/PATCH /userIncidents/{id}
     *
     * @param  int $id
     * @param UpdateUserIncidentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserIncidentAPIRequest $request)
    {
        $input = $request->all();

        /** @var UserIncident $userIncident */
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            return $this->sendError('User Incident not found');
        }

        $userIncident = $this->userIncidentRepository->update($input, $id);

        return $this->sendResponse($userIncident->toArray(), 'UserIncident updated successfully');
    }

    /**
     * Remove the specified UserIncident from storage.
     * DELETE /userIncidents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UserIncident $userIncident */
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            return $this->sendError('User Incident not found');
        }

        $userIncident->delete();

        return $this->sendResponse($id, 'User Incident deleted successfully');
    }
}
