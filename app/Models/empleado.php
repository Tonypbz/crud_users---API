<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $codigo
 * @property $apellidos
 * @property $nombres
 * @property $users_id
 * @property $ingreso
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property EmpleadoCarrera[] $empleadoCarreras
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'apellidos' => 'required',
		'nombres' => 'required',
		'users_id' => 'required',
		'ingreso' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','apellidos','nombres','users_id','ingreso','estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleadoCarreras()
    {
        return $this->hasMany('App\Models\EmpleadoCarrera', 'empleados_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    

}
