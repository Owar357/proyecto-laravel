<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $modelo = Modelo::all();
            return $modelo;
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $modelo = new Modelo;

            $modelo->nombre  = $request->nombre;
            if ($modelo->save() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $modelo], 201);
            } else {
                return response()->json(['status' => 'ok', 'data' => $modelo], 409);
            }
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['status' => 'fail', 'data' => $modelo, 'message' => 'El modelo ya fue registrado'], 409);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         //DEVOLVER UN REGISTRO  DEVUELVE UN REGISTRO  POR MEDIO DE UN ID
         try {
            $modelo = Modelo::findOrFail($id);

            return $modelo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $modelo = modelo::findOrFail($id);

            $modelo->nombre = $request->nombre;
            if ($modelo->update() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $modelo, 'message' => 'Modelo Actualizado'], 201);
            } else {
                return response()->json(['status' => 'ok', 'data' => $modelo, 'message' => 'Modelo no acualizado'], 201);
            }
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['status' => 'fail', 'data' => $modelo, 'message' => 'El modelo ya fue registrado'], 409);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $modelo = Modelo::findOrFail($id);
            if ($modelo->delete() >=  1) {
                return response()->json(['status' => 'ok', 'data' => $modelo, 'message' => 'El modelo se elimino con exito'], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
