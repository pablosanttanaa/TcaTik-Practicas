<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function showAll()
    {
        $almacenes = Almacen::paginate(10);
        return view('almacenes', ['almacenes' => $almacenes]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtNombreAlmacen' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return back()->with('Incorrecto', 'Error al crear el almacén');
        }

        try {
            $nuevoAlmacen = new Almacen();
            $nuevoAlmacen->nombre = $request->txtNombreAlmacen;
            $nuevoAlmacen->save();

            return back()->with('Correcto', 'Almacén creado correctamente');
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al crear el almacén');
        }
    }

    public function delete($id)
    {
        try {
            // Encuentra el almacén por su ID
            $almacen = Almacen::findOrFail($id);

            // Elimina el almacén
            $almacen->delete();

            return redirect()
                ->route('ver.almacenes')
                ->with('success', '¡Almacén eliminado correctamente!');
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Error al eliminar el almacén: ' . $e->getMessage()
            );
        }
    }
}
