<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtNombreCategoria' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return back()->with('Incorrecto', 'Error al crear la categoría');
        }

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
        $categorias = Categoria::paginate(10); // Paginar con 10 categorías por página
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
            return redirect()
                ->route('ver.categorias')
                ->with('success', '¡Categoría eliminada correctamente!');
        } catch (QueryException $e) {
            // Verifica si la excepción se debe a una violación de integridad referencial
            if ($e->getCode() === '23000') {
                return back()->with(
                    'error',
                    'No se puede eliminar una categoría si existe un producto asociado a ella'
                );
            }
            return back()->with(
                'error',
                'Error al eliminar la categoría: ' . $e->getMessage()
            );
        } catch (\Exception $e) {
            // Manejar cualquier otro error que pueda ocurrir
            return back()->with('error', 'Error al eliminar la categoría');
        }
    }
}
