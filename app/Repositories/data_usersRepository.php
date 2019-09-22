<?php

namespace App\Repositories;

use App\Models\data_users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class data_usersRepository
 * @package App\Repositories
 * @version September 12, 2019, 12:34 pm UTC
 *
 * @method data_users findWithoutFail($id, $columns = ['*'])
 * @method data_users find($id, $columns = ['*'])
 * @method data_users first($columns = ['*'])
*/
class data_usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'email',
        'password',
        'no_ktp',
        'alamat',
        'no_hp',
        'pekerjaan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return data_users::class;
    }
}
