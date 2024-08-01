<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DEVUELVE UNA LISTA DE REGISTROS GUARDADOS
        //CONTROLLADOR DE EXCEPCIONES

        try {
            $marca = Marca::all();
            return $marca;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //GUARDAR UN REGISTRO
        //CONTROLADOR DE EXCEPCIONES
        //php artisan route:list para ver lista de rutas disponible

        try {
            $marca = new Marca;

            $marca->nombre = $request->nombre;

            if ($marca->save() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $marca], 201);
            } else {
                return response()->json(['status' => 'fail', 'data' => $marca], 409);
            }
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['status' => 'fail', 'data' => $marca, 'message' => 'La marca ya fue registrada'], 409);
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
            $marca = Marca::findOrFail($id);

            return $marca;
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
            $marca = Marca::findOrFail($id);

            $marca->nombre = $request->nombre;
            if ($marca->update() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $marca], 201);
            }
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(['status' => 'fail', 'data' => $marca, 'message' => 'La marca ya fue registrada'], 409);
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
          //ELIMINAR UN REGISTRO
          try {
            $marca = Marca::findOrFail($id);
            if ($marca->delete() >=  1) {
                return response()->json(['status' => 'ok', 'data' => $marca], 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    
}
