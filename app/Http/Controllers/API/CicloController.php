<?php

namespace App\Http\Controllers\API;

use App\Http\Middleware\ReactAdminResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CicloResource;
use App\Models\Ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public $modelclass = Ciclo::class;

    public function index(Request $request)
    {
        $query = ReactAdminResponse::applyFilter($request, ['codCiclo', 'codFamilia', 'grado', 'nombre']);

        $query = ReactAdminResponse::applySort($request, $query);

        return CicloResource::collection(
            //$query-> orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            $query ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ciclo = json_decode($request->getContent(), true);

        $ciclo = Ciclo::create($ciclo);

        return new CicloResource($ciclo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciclo $ciclo)
    {
        return new CicloResource($ciclo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        $cicloData = json_decode($request->getContent(), true);
        $ciclo->update($cicloData);

        return new CicloResource($ciclo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciclo $ciclo)
    {
        try {
            $ciclo->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()], 400);
        }
    }
}
