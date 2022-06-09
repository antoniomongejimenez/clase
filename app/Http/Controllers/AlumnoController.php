<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('alumnos.index', [
            'alumnos' => $alumnos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumno = new Alumno();

        return view('alumnos.create', [
            'alumno' => $alumno
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        $validados = $request->validated();
        $alumno = new Alumno($validados);
        $alumno->save();
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', [
            'notafinal' => 0,
            'contador' => 0,
            'notas' => $alumno->notas->groupBy('ccee_id'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $validados = $request->validated();
        $alumno->nombre = $validados['nombre'];
        $alumno->save();

        return redirect()->route('alumnos.index')->with('success', 'Alumno modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        if ($alumno->notas()->count() === 0) {
            $alumno->delete();
            return redirect()->route('alumnos.index')->with('success', 'Alumno borrado con exito');
        }
        return redirect()->route('alumnos.index')->with('error', 'Este alumno tiene notas asociadas.');
    }


    public function criterios(Alumno $alumno)
    {
        return view('alumnos.criterios', [
            'notas' => $alumno->notas,
        ]);
    }
}
