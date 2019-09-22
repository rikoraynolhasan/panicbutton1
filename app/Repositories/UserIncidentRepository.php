<?php

namespace App\Repositories;

use App\Models\UserIncident;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserIncidentRepository
 * @package App\Repositories
 * @version September 22, 2019, 9:35 am UTC
 *
 * @method UserIncident findWithoutFail($id, $columns = ['*'])
 * @method UserIncident find($id, $columns = ['*'])
 * @method UserIncident first($columns = ['*'])
*/
class UserIncidentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_data_id',
        'incident_id',
        'latitude',
        'longitude',
        'tanggal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserIncident::class;
    }
}
