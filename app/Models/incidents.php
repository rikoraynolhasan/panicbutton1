<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class incidents
 * @package App\Models
 * @version September 12, 2019, 12:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection detailsIncidents
 * @property string nama
 */
class incidents extends Model
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
    public function detailsIncidents()
    {
        return $this->hasMany(\App\Models\DetailsIncident::class, 'incident_id');
    }
}
