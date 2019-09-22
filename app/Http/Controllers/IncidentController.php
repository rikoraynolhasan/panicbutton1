<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Repositories\IncidentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IncidentController extends AppBaseController
{
    /** @var  IncidentRepository */
    private $incidentRepository;

    public function __construct(IncidentRepository $incidentRepo)
    {
        $this->incidentRepository = $incidentRepo;
    }

    /**
     * Display a listing of the Incident.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->incidentRepository->pushCriteria(new RequestCriteria($request));
        $incidents = $this->incidentRepository->all();

        return view('incidents.index')
            ->with('incidents', $incidents);
    }

    /**
     * Show the form for creating a new Incident.
     *
     * @return Response
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created Incident in storage.
     *
     * @param CreateIncidentRequest $request
     *
     * @return Response
     */
    public function store(CreateIncidentRequest $request)
    {
        $input = $request->all();

        $incident = $this->incidentRepository->create($input);

        Flash::success('Incident saved successfully.');

        return redirect(route('incidents.index'));
    }

    /**
     * Display the specified Incident.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            Flash::error('Incident not found');

            return redirect(route('incidents.index'));
        }

        return view('incidents.show')->with('incident', $incident);
    }

    /**
     * Show the form for editing the specified Incident.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            Flash::error('Incident not found');

            return redirect(route('incidents.index'));
        }

        return view('incidents.edit')->with('incident', $incident);
    }

    /**
     * Update the specified Incident in storage.
     *
     * @param  int              $id
     * @param UpdateIncidentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncidentRequest $request)
    {
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            Flash::error('Incident not found');

            return redirect(route('incidents.index'));
        }

        $incident = $this->incidentRepository->update($request->all(), $id);

        Flash::success('Incident updated successfully.');

        return redirect(route('incidents.index'));
    }

    /**
     * Remove the specified Incident from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $incident = $this->incidentRepository->findWithoutFail($id);

        if (empty($incident)) {
            Flash::error('Incident not found');

            return redirect(route('incidents.index'));
        }

        $this->incidentRepository->delete($id);

        Flash::success('Incident deleted successfully.');

        return redirect(route('incidents.index'));
    }
}
