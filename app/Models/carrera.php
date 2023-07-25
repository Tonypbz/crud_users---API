<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrera
 *
 * @property $id
 * @property $nombrecarrera
 * @property $estado
 * @property $facultad
 * @property $created_at
 * @property $updated_at
 *
 * @property EmpleadoCarrera[] $empleadoCarreras
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carrera extends Model
{
    
    static $rules = [
		'nombrecarrera' => 'required',
		'facultad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecarrera','estado','facultad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoCarreras()
    {
        return $this->hasMany('App\Models\EmpleadoCarrera', 'carreras_id', 'id');
    }
    

}
