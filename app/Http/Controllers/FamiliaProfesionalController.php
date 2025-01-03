<?php

namespace App\Http\Controllers;

use App\Models\FamiliaProfesional;

class FamiliaProfesionalController extends Controller
{
    public function getIndex()
    {
        return view('familias_profesionales.index')
            ->with('familiasProfesionales', FamiliaProfesional::all());
    }

    public function getShow($id)
    {
        return view('familias_profesionales.show')
            ->with('familiaProfesional', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);
    }

    public function getCreate()
    {
        return view('familias_profesionales.create');
    }

    public function getEdit($id)
    {
        return view('familias_profesionales.edit')
            ->with('familiaProfesional', FamiliaProfesional::findOrFail($id))
            ->with('id', $id);
    }
}
