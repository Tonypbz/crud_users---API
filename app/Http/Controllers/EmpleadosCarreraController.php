<?php

namespace App\Http\Controllers;

use App\Models\EmpleadosCarrera;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Carrera;

/**
 * Class EmpleadosCarreraController
 * @package App\Http\Controllers
 */
class EmpleadosCarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleadosCarreras = EmpleadosCarrera::paginate();

        return view('empleados-carrera.index', compact('empleadosCarreras'))
            ->with('i', (request()->input('page', 1) - 1) * $empleadosCarreras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleadosCarrera = new EmpleadosCarrera();
        $empleados = Empleado::where('estado','activo')->pluck('id','id');
        $carreras = Carrera::where('estado','activo')->pluck('id','id');
        return view('empleados-carrera.create', compact('empleados', 'carreras','empleadosCarrera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmpleadosCarrera::$rules);

        $empleadosCarrera = EmpleadosCarrera::create($request->all());

        return redirect()->route('empleados-carreras.index')
            ->with('Exito', 'Empleados de la carrera agregados correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleadosCarrera = EmpleadosCarrera::find($id);

        $empleados = $empleadosCarrera->empleado;
        $carreras = $empleadosCarrera->carrera;
        return view('empleados-carrera.show', compact('empleadosCarrera','empleados','carreras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados = Empleado::where('estado','activo')->pluck('id','id');
        $carreras = Carrera::where('estado','activo')->pluck('id','id');
        $empleadosCarrera = EmpleadosCarrera::find($id);
        return view('empleados-carrera.edit', compact('empleadosCarrera', 'empleados', 'carreras'));
        /*$empleadosCarrera = EmpleadosCarrera::find($id);

        return view('empleados-carrera.edit', compact('empleadosCarrera'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmpleadosCarrera $empleadosCarrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadosCarrera $empleadosCarrera)
    {
        request()->validate(EmpleadosCarrera::$rules);

        $empleadosCarrera->update($request->all());

        return redirect()->route('empleados-carreras.index')
            ->with('Exito', 'Empleados de la carrera actualizados correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empleadosCarrera = EmpleadosCarrera::find($id)->delete();

        return redirect()->route('empleados-carreras.index')
            ->with('Exito', 'Empleados de la carrera eliminados correctamente');
    }
    public function cestado($id)
    {
        $empleadosCarrera = EmpleadosCarrera::findOrFail($id);

        if ($empleadosCarrera->estado === 'Activo') {
            $empleadosCarrera->estado = 'Inactivo';
        } else {
            $empleadosCarrera->estado = 'Activo';
        }

        $empleadosCarrera->save();

        return redirect()->back()->with('Exito', 'Estado cambiado exitosamente.');
    }
}
