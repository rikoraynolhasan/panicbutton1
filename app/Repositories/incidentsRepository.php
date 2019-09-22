<?php

namespace App\Repositories;

use App\Models\incidents;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class incidentsRepository
 * @package App\Repositories
 * @version September 12, 2019, 12:32 pm UTC
 *
 * @method incidents findWithoutFail($id, $columns = ['*'])
 * @method incidents find($id, $columns = ['*'])
 * @method incidents first($columns = ['*'])
*/
class incidentsRepository extends BaseRepository
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
        return incidents::class;
    }
}
