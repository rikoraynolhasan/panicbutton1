<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Incident
 * @package App\Models
 * @version September 22, 2019, 9:07 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection userIncidents
 * @property string nama
 */
class Incident extends Model
{
    use SoftDeletes;

    public $table = 'incidents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userIncidents()
    {
        return $this->hasMany(\App\Models\UserIncident::class, 'incident_id');
    }
}
