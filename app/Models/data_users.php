<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class data_users
 * @package App\Models
 * @version September 12, 2019, 12:34 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailsIncidents
 * @property string nama
 * @property string email
 * @property string password
 * @property string no_ktp
 * @property string alamat
 * @property string no_hp
 * @property string pekerjaan
 */
class data_users extends Model
{
    use SoftDeletes;

    public $table = 'data_users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'email',
        'password',
        'no_ktp',
        'alamat',
        'no_hp',
        'pekerjaan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'email' => 'string',
        'password' => 'string',
        'no_ktp' => 'string',
        'alamat' => 'string',
        'no_hp' => 'string',
        'pekerjaan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        'no_ktp' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'pekerjaan' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailsIncidents()
    {
        return $this->hasMany(\App\Models\DetailsIncident::class, 'user_data_id');
    }
}
