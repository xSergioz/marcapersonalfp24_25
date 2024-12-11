<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function getIndex()
    {
        return view('estudiantes.index')
            ->with('estudiantes', Docente::all());
    }

    public function getShow($id)
    {
            return view('proyectos.show')
                ->with('proyecto', Proyecto::findOrFail($id))
                ->with('id', $id);
    }

    public function getCreate()
    {
        return view('proyectos.create');
    }

    public function getEdit($id)
    {
            return view('proyectos.edit')
                ->with('proyecto', Proyecto::findOrFail($id))
                ->with('id', $id);
    }
}
