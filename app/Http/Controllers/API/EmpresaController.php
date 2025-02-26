<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Models\Empresa;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class EmpresaController extends Controller implements HasMiddleware
{
    public $modelclass = Empresa::class;
    /**
     * Display a listing of the resource.
     */

    public static function middleware(): array {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }
    public function index(Request $request)
    {
        $query =
            $request->attributes->has('queryWithParameters') ?
            $request->attributes->get('queryWithParameters') :
            Empresa::query();
        return EmpresaResource::collection($query->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa = json_decode($request->getContent(), true);

        $empresa['user_id'] = Auth::id();

        $empresa = Empresa::create($empresa);

        return new EmpresaResource($empresa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresaData = json_decode($request->getContent(), true);
        $empresa->update($empresaData);

        return new EmpresaResource($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        try {
            $empresa->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()], 400);
        }
    }
}
