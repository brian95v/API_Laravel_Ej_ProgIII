<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\UnidadesCurriculares;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class CarrerasController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Carreras::all();
    }

    public function showWithUC()
    {
        try {
            return Carreras::with('unidadesCurriculares')->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error en la búsqueda',
                'error' => $e->getMessage()
            ], 500);
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
            $request->validate([
                'carNombre' => 'required|string|max:200',
            ]);

            $myCarrera = new Carreras;
            $myCarrera->carNombre = $request->carNombre;
            $myCarrera->save();


            return response()->json([
                'message' => 'Carrera creada correctamente',
                'data' => $myCarrera
            ])->setStatusCode(201);
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            return response()->json([
                'message' => 'Datos enviados no válidos',
                //'errors' => $e->validator->errors()
            ], 422); // Código de estado 422 para errores de validación

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la carrera',
                //'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            return Carreras::with('unidadesCurriculares')->find($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error en la búsqueda',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carreras $carreras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'carNombre' => 'required|string|max:200',
            ]);

            $myCarrera = Carreras::find($id);
            $myCarrera->carNombre = $request->carNombre;
            $myCarrera->save();

            return response()->json([
                'message' => 'Carrera actualizada correctamente',
                'data' => $myCarrera
            ])->setStatusCode(200);
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            return response()->json([
                'message' => 'Datos enviados no válidos',
                //'errors' => $e->validator->errors()
            ], 422); // Código de estado 422 para errores de validación
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la carrera',
                //'error' => $e->getMessage()
            ], 500); // Puedes cambiar el código de estado según sea necesario
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $mycarrera = Carreras::destroy($id);
            return response()->json([
                'message' => 'Carrera eliminada correctamente'
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la carrera',
                //'error' => $e->getMessage()
            ], 500); // Puedes cambiar el código de estado según sea necesario
        }
    }
}
