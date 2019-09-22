<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserIncidentRequest;
use App\Http\Requests\UpdateUserIncidentRequest;
use App\Repositories\UserIncidentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserIncidentController extends AppBaseController
{
    /** @var  UserIncidentRepository */
    private $userIncidentRepository;

    public function __construct(UserIncidentRepository $userIncidentRepo)
    {
        $this->userIncidentRepository = $userIncidentRepo;
    }

    /**
     * Display a listing of the UserIncident.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userIncidentRepository->pushCriteria(new RequestCriteria($request));
        $userIncidents = $this->userIncidentRepository->all();

        return view('user_incidents.index')
            ->with('userIncidents', $userIncidents);
    }

    /**
     * Show the form for creating a new UserIncident.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_incidents.create');
    }

    /**
     * Store a newly created UserIncident in storage.
     *
     * @param CreateUserIncidentRequest $request
     *
     * @return Response
     */
    public function store(CreateUserIncidentRequest $request)
    {
        $input = $request->all();

        $userIncident = $this->userIncidentRepository->create($input);

        Flash::success('User Incident saved successfully.');

        return redirect(route('userIncidents.index'));
    }

    /**
     * Display the specified UserIncident.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            Flash::error('User Incident not found');

            return redirect(route('userIncidents.index'));
        }

        return view('user_incidents.show')->with('userIncident', $userIncident);
    }

    /**
     * Show the form for editing the specified UserIncident.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            Flash::error('User Incident not found');

            return redirect(route('userIncidents.index'));
        }

        return view('user_incidents.edit')->with('userIncident', $userIncident);
    }

    /**
     * Update the specified UserIncident in storage.
     *
     * @param  int              $id
     * @param UpdateUserIncidentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserIncidentRequest $request)
    {
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            Flash::error('User Incident not found');

            return redirect(route('userIncidents.index'));
        }

        $userIncident = $this->userIncidentRepository->update($request->all(), $id);

        Flash::success('User Incident updated successfully.');

        return redirect(route('userIncidents.index'));
    }

    /**
     * Remove the specified UserIncident from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userIncident = $this->userIncidentRepository->findWithoutFail($id);

        if (empty($userIncident)) {
            Flash::error('User Incident not found');

            return redirect(route('userIncidents.index'));
        }

        $this->userIncidentRepository->delete($id);

        Flash::success('User Incident deleted successfully.');

        return redirect(route('userIncidents.index'));
    }
}
