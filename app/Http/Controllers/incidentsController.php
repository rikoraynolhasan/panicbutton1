<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateincidentsRequest;
use App\Http\Requests\UpdateincidentsRequest;
use App\Repositories\incidentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class incidentsController extends AppBaseController
{
    /** @var  incidentsRepository */
    private $incidentsRepository;

    public function __construct(incidentsRepository $incidentsRepo)
    {
        $this->incidentsRepository = $incidentsRepo;
    }

    /**
     * Display a listing of the incidents.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->incidentsRepository->pushCriteria(new RequestCriteria($request));
        $incidents = $this->incidentsRepository->all();

        return view('incidents.index')
            ->with('incidents', $incidents);
    }

    /**
     * Show the form for creating a new incidents.
     *
     * @return Response
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created incidents in storage.
     *
     * @param CreateincidentsRequest $request
     *
     * @return Response
     */
    public function store(CreateincidentsRequest $request)
    {
        $input = $request->all();

        $incidents = $this->incidentsRepository->create($input);

        Flash::success('Incidents saved successfully.');

        return redirect(route('incidents.index'));
    }

    /**
     * Display the specified incidents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $incidents = $this->incidentsRepository->findWithoutFail($id);

        if (empty($incidents)) {
            Flash::error('Incidents not found');

            return redirect(route('incidents.index'));
        }

        return view('incidents.show')->with('incidents', $incidents);
    }

    /**
     * Show the form for editing the specified incidents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $incidents = $this->incidentsRepository->findWithoutFail($id);

        if (empty($incidents)) {
            Flash::error('Incidents not found');

            return redirect(route('incidents.index'));
        }

        return view('incidents.edit')->with('incidents', $incidents);
    }

    /**
     * Update the specified incidents in storage.
     *
     * @param  int              $id
     * @param UpdateincidentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateincidentsRequest $request)
    {
        $incidents = $this->incidentsRepository->findWithoutFail($id);

        if (empty($incidents)) {
            Flash::error('Incidents not found');

            return redirect(route('incidents.index'));
        }

        $incidents = $this->incidentsRepository->update($request->all(), $id);

        Flash::success('Incidents updated successfully.');

        return redirect(route('incidents.index'));
    }

    /**
     * Remove the specified incidents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $incidents = $this->incidentsRepository->findWithoutFail($id);

        if (empty($incidents)) {
            Flash::error('Incidents not found');

            return redirect(route('incidents.index'));
        }

        $this->incidentsRepository->delete($id);

        Flash::success('Incidents deleted successfully.');

        return redirect(route('incidents.index'));
    }
}
