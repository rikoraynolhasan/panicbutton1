<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdata_usersRequest;
use App\Http\Requests\Updatedata_usersRequest;
use App\Repositories\data_usersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class data_usersController extends AppBaseController
{
    /** @var  data_usersRepository */
    private $dataUsersRepository;

    public function __construct(data_usersRepository $dataUsersRepo)
    {
        $this->dataUsersRepository = $dataUsersRepo;
    }

    /**
     * Display a listing of the data_users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataUsersRepository->pushCriteria(new RequestCriteria($request));
        $dataUsers = $this->dataUsersRepository->all();

        return view('data_users.index')
            ->with('dataUsers', $dataUsers);
    }

    /**
     * Show the form for creating a new data_users.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_users.create');
    }

    /**
     * Store a newly created data_users in storage.
     *
     * @param Createdata_usersRequest $request
     *
     * @return Response
     */
    public function store(Createdata_usersRequest $request)
    {
        $input = $request->all();

        $dataUsers = $this->dataUsersRepository->create($input);

        Flash::success('Data Users saved successfully.');

        return redirect(route('dataUsers.index'));
    }

    /**
     * Display the specified data_users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataUsers = $this->dataUsersRepository->findWithoutFail($id);

        if (empty($dataUsers)) {
            Flash::error('Data Users not found');

            return redirect(route('dataUsers.index'));
        }

        return view('data_users.show')->with('dataUsers', $dataUsers);
    }

    /**
     * Show the form for editing the specified data_users.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataUsers = $this->dataUsersRepository->findWithoutFail($id);

        if (empty($dataUsers)) {
            Flash::error('Data Users not found');

            return redirect(route('dataUsers.index'));
        }

        return view('data_users.edit')->with('dataUsers', $dataUsers);
    }

    /**
     * Update the specified data_users in storage.
     *
     * @param  int              $id
     * @param Updatedata_usersRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedata_usersRequest $request)
    {
        $dataUsers = $this->dataUsersRepository->findWithoutFail($id);

        if (empty($dataUsers)) {
            Flash::error('Data Users not found');

            return redirect(route('dataUsers.index'));
        }

        $dataUsers = $this->dataUsersRepository->update($request->all(), $id);

        Flash::success('Data Users updated successfully.');

        return redirect(route('dataUsers.index'));
    }

    /**
     * Remove the specified data_users from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataUsers = $this->dataUsersRepository->findWithoutFail($id);

        if (empty($dataUsers)) {
            Flash::error('Data Users not found');

            return redirect(route('dataUsers.index'));
        }

        $this->dataUsersRepository->delete($id);

        Flash::success('Data Users deleted successfully.');

        return redirect(route('dataUsers.index'));
    }
}
