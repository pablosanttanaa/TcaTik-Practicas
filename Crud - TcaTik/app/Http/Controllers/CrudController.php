<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;
use App\Models\Almacen;
use App\Models\Categoria;

class CrudController extends Controller
{
    public function index()
    {
        $datos = Producto::paginate(10); // Obtener productos paginados, 10 por página
        $almacenes = Almacen::all();
        $categorias = Categoria::all();

        return view('welcome', compact('datos', 'almacenes', 'categorias'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtNombre' => 'required|min:3',
            'txtPrecio' => 'required',
            'txtObservaciones' => 'nullable|max:50',
        ]);

        if ($validator->fails()) {
            return back()->with('Incorrecto', 'Error al registrar el producto');
        }

        try {
            $nuevoProducto = new Producto();
            $nuevoProducto->nombre = $request->input('txtNombre');
            $nuevoProducto->precio = $request->input('txtPrecio');
            $nuevoProducto->observaciones = $request->input('txtObservaciones');
            $nuevoProducto->categoria_id = $request->input('txtCategoría');
            $nuevoProducto->save();

            $nuevoProducto->almacens()->attach($request->input('txtAlmacén'));

            return back()->with(
                'Correcto',
                'Producto registrado correctamente'
            );
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al registrar el producto');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'txtNombre' => 'required|min:3',
            'txtPrecio' => 'required',
            'txtObservaciones' => 'nullable|max:50',
        ]);

        if ($validator->fails()) {
            return back()->with(
                'Incorrecto',
                'Error al actualizar el producto'
            );
        }

        try {
            $producto = Producto::findOrFail($request->id_producto);
            $producto->nombre = $request->txtNombre;
            $producto->precio = $request->txtPrecio;
            $producto->observaciones = $request->txtObservaciones;
            $producto->categoria_id = $request->txtCategoría;
            $producto->save();

            $producto->almacens()->sync([$request->txtAlmacén]);

            return back()->with(
                'Correcto',
                'Producto actualizado correctamente'
            );
        } catch (\Throwable $th) {
            return back()->with(
                'Incorrecto',
                'Error al actualizar el producto'
            );
        }
    }

    public function delete($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            return back()->with('Correcto', 'Producto eliminado correctamente');
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al eliminar el producto');
        }
    }
}
