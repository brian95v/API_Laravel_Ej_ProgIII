<?php

namespace App\Http\Controllers;

use App\Models\UnidadesCurriculares;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class UnidadesCurricularesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UnidadesCurriculares::with('carrera')->get();
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
                'ucNombre' => 'required|string|max:200',
                'carrera_id' => 'required|exists:carreras,id'

            ]);

            $myUnidadCurricular = new UnidadesCurriculares;
            $myUnidadCurricular->ucNombre = $request->ucNombre;
            $myUnidadCurricular->carrera_id = $request->carrera_id;
            $myUnidadCurricular->save();


            return response()->json([
                'message' => 'Unidad Curricular creada correctamente',
                'data' => $myUnidadCurricular
            ])->setStatusCode(201);
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            return response()->json([
                'message' => 'Datos enviados no válidos',
                //'errors' => $e->validator->errors()
            ], 422); // Código de estado 422 para errores de validación

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la Unidad Curricular',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadesCurriculares $unidadesCurriculares)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadesCurriculares $unidadesCurriculares)
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
                'ucNombre' => 'required|string|max:200',
                'idCarrera' => 'required|exists:carreras,id'

            ]);

            $myUnidadCurricular = UnidadesCurriculares::find($id);
            $myUnidadCurricular->ucNombre = $request->ucNombre;
            $myUnidadCurricular->save();

            return response()->json([
                'message' => 'Unidad Curricular actualizada correctamente',
                'data' => $myUnidadCurricular
            ])->setStatusCode(200);
        } catch (ValidationException $e) {
            // Manejar la excepción de validación
            return response()->json([
                'message' => 'Datos enviados no válidos',
                //'errors' => $e->validator->errors()
            ], 422); // Código de estado 422 para errores de validación
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la Unidad Curricular',
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
            $mycarrera = UnidadesCurriculares::destroy($id);
            return response()->json([
                'message' => 'Unidad Curricular eliminada correctamente',
                'data' => $mycarrera
            ])->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar la Unidad Curricular',
                //'error' => $e->getMessage()
            ], 500); // Puedes cambiar el código de estado según sea necesario
        }
    }
}
