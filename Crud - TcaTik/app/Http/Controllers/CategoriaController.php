<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function create(Request $request)
    {
        try {
            $nuevaCategoria = new Categoria();
            $nuevaCategoria->nombre = $request->txtNombreCategoria;

            $nuevaCategoria->save();

            return back()->with('Correcto', 'Categoría creada correctamente');
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al crear la categoría');
        }
    }

    public function showAll()
    {
        $categorias = Categoria::all();
        return view('categorias', ['categorias' => $categorias]);
    }

    public function delete($id)
    {
        try {
            // Encuentra la categoría por su ID
            $categoria = Categoria::findOrFail($id);

            // Elimina la categoría
            $categoria->delete();

            // Redirecciona con un mensaje de éxito
            return redirect()->route('ver.categorias')->with('success', '¡Categoría eliminada correctamente!');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir
            return back()->with('error', 'Error al eliminar la categoría: ' . $e->getMessage());
        }
    }
}
