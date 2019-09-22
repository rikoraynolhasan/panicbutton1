<?php

namespace App\Repositories;

use App\Models\Incident;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IncidentRepository
 * @package App\Repositories
 * @version September 22, 2019, 9:07 am UTC
 *
 * @method Incident findWithoutFail($id, $columns = ['*'])
 * @method Incident find($id, $columns = ['*'])
 * @method Incident first($columns = ['*'])
*/
class IncidentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Incident::class;
    }
}
