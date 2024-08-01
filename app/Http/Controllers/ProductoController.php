<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $producto = Producto::all();
            //Pasando producto a un array
            $response = $producto->toArray();
            $i = 0;
            foreach ($producto as $p) {
                $response[$i]['marca'] = $p->marca->toArray();
                $response[$i]['modelo'] = $p->modelo->toArray();
                $i++;
            }
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
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
            $producto = new Producto();
            $producto->descripcion = $request->descripcion;
            $producto->imagen = $request->imagen;
            $producto->existencia = $request->existencia;
            $producto->precio = $request -> precio;
            //llAVES FORANEAS
            $producto->marca_id  = $request->marca['id'];
            $producto->modelo_id  = $request->modelo['id'];
            if ($producto->save() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $producto,'message' => 'producto registrado'], 201);
            } else {
                return response()->json(['status' => 'fail', 'data' => $producto,'message' => 'producto no registrado'], 409);
            }
          } catch (\Exception $e) {
              return  $e ->getMessage();
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            $producto = Producto::findOrFail($id);
            $producto->descripcion = $request->descripcion;
            $producto->imagen = $request->imagen;
            $producto->existencia = $request->existencia;
            $producto->precio = $request -> precio;
            //llAVES FORANEAS
            $producto->marca_id  = $request->marca['id'];
            $producto->modelo_id  = $request->modelo['id'];
            if ($producto->save() >= 1) {
                return response()->json(['status' => 'ok', 'data' => $producto,'message' => 'producto actualizado'], 201);
            } else {
                return response()->json(['status' => 'fail', 'data' => $producto,'message' => 'producto no actualizado'], 409);
            }
          } catch (\Exception $e) {
              return  $e ->getMessage();
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
