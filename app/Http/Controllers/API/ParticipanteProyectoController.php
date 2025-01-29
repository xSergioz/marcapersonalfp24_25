<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParticipanteProyectoResource;
use App\Models\ParticipanteProyecto;
use Illuminate\Http\Request;

class ParticipanteProyectoController extends Controller
{
    public $modelclass = ParticipanteProyecto::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ParticipanteProyectoResource::collection(
            ParticipanteProyecto::orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage ?? 15)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $participanteProyectoData = json_decode($request->getContent(), true);
        $participanteProyecto = ParticipanteProyecto::create($participanteProyectoData);

        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipanteProyecto $participanteProyecto)
    {
        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipanteProyecto $participanteProyecto)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $participanteProyectoData = json_decode($request->getContent(), true);
        $participanteProyecto->update($participanteProyectoData);

        return new ParticipanteProyectoResource($participanteProyecto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipanteProyecto $participanteProyecto)
    {
        try {
            $participanteProyecto->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
