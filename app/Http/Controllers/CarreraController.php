<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

/**
 * Class CarreraController
 * @package App\Http\Controllers
 */
class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::paginate();

        return view('carrera.index', compact('carreras'))
            ->with('i', (request()->input('page', 1) - 1) * $carreras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrera = new Carrera();
        return view('carrera.create', compact('carrera'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carrera::$rules);

        $carrera = Carrera::create($request->all());

        return redirect()->route('carreras.index')
            ->with('Exito', 'Carrera agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carrera::find($id);

        return view('carrera.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carrera::find($id);

        return view('carrera.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrera $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        request()->validate(Carrera::$rules);

        $carrera->update($request->all());

        return redirect()->route('carreras.index')
            ->with('Exito', 'Carrera actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id)->delete();

        return redirect()->route('carreras.index')
            ->with('Exito', 'Carrera eliminada correctamente');
    }
    public function cestado($id)
    {
        $carrera = Carrera::findOrFail($id);

        if ($carrera->estado === 'Activo') {
            $carrera->estado = 'Inactivo';
        } else {
            $carrera->estado = 'Activo';
        }

        $carrera->save();

        return redirect()->back()->with('Exito', 'Estado cambiado exitosamente.');
    }
}
