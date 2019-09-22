<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserIncident
 * @package App\Models
 * @version September 22, 2019, 9:35 am UTC
 *
 * @property \App\Models\Incident incident
 * @property \App\Models\User userData
 * @property integer user_data_id
 * @property integer incident_id
 * @property float latitude
 * @property float longitude
 * @property string|\Carbon\Carbon tanggal
 */
class UserIncident extends Model
{
    use SoftDeletes;

    public $table = 'user_incidents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_data_id',
        'incident_id',
        'latitude',
        'longitude',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_data_id' => 'integer',
        'incident_id' => 'integer',
        'latitude' => 'float',
        'longitude' => 'float',
        'tanggal' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_data_id' => 'required',
        'incident_id' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'tanggal' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function incident()
    {
        return $this->belongsTo(\App\Models\Incident::class, 'incident_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userData()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_data_id');
    }
}
