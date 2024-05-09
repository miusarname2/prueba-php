<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Documento;
use App\Models\numeracion;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::all();
        return response()->json($documentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idnumeracion' => 'required|exists:numeracion,id',
            'idestado' => 'required|exists:estado,id',
            'numero' => 'required|unique:documento,numero',
            'fecha' => 'required|date',
            'base' => 'required|numeric',
            'impuestos' => 'required|numeric',
        ]);
        // 2. Create a new model instance
        $Documento = new Documento();

        // 3. Assign validated data to the model attributes
        $Documento->fill($validatedData);
        // $Documento->fill([
        //     'idnumeracion'=>1,
        //     'idestado'=>1,
        //     'numero'=>1234,
        //     'fecha'=>"2024-05-08T23:37:29.000000Z",
        //     'base'=>1,
        //     'impuestos'=>1
        // ]);  // This fills all validated fields
        $lastId = Documento::max('id');
        $Documento->id = $lastId !== null ? $lastId + 1 : 1;
        // 4. Save the model to the database
        $Documento->save();

        // 5. Optionally perform additional actions after saving (e.g., send an email)

        // 6. Return a success response
        return response()->json(['message' => 'Record created successfully!','status'=>201], 201);
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Documento::find($id);
        if (!$document) {
            return response()->json(['message' => 'Not found','status'=>404], 404);
        }

        return response()->json(['message' => 'Success','status'=>200,'data'=>$document],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $document = Documento::find($id);

        // Verifica si el usuario existe
        if (!$document) {
            // Maneja el caso donde el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'numero' => 'required',
            'base' => 'required|numeric',
            'impuestos' => 'required|numeric',
        ]);

        $documento=Documento::findOrFail($id);

        // Actualizar el documento con los datos validados
        $documento->numero = $validatedData['numero'];
        $documento->base = $validatedData['base'];
        $documento->impuestos = $validatedData['impuestos'];
        // Asignar otros atributos según tu lógica

        // Guardar los cambios en el documento
        $documento->save();

        // Puedes devolver una respuesta JSON u otra acción según tu aplicación
        return response()->json(['message' => 'Documento actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encuentra el usuario por su ID
        $documento = Documento::find($id);

        // Verifica si el usuario existe
        if (!$documento) {
            // Maneja el caso donde el usuario no existe
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Elimina el usuario
        $documento->delete();

        // Devuelve una respuesta de éxito
        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
}
