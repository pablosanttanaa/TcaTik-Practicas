<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Almacen;
use App\Models\Categoria;

class CrudController extends Controller
{
    public function index()
    {
        $datos = Producto::all();
        $almacenes = Almacen::all();
        $categorias = Categoria::all();

        return view('welcome', compact('datos', 'almacenes', 'categorias'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'txtNombre' => 'required|min:3',
            'txtObservaciones' => 'required|min:3',
        ]);

        try {
            $nuevoProducto = new Producto();
            $nuevoProducto->nombre = $request->input('txtNombre');
            $nuevoProducto->precio = $request->input('txtPrecio');
            $nuevoProducto->observaciones = $request->input('txtObservaciones');
            $nuevoProducto->categoria_id = $request->input('txtCategoría');
            $nuevoProducto->save();

            $nuevoProducto->almacens()->attach($request->input('txtAlmacén'));

            return back()->with('Correcto', 'Producto registrado correctamente');
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al registrar el producto');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'txtNombre' => 'required|min:3',
            'txtObservaciones' => 'required|min:3',
        ]);

        try {
            $producto = Producto::findOrFail($request->id_producto);
            $producto->nombre = $request->txtNombre;
            $producto->precio = $request->txtPrecio;
            $producto->observaciones = $request->txtObservaciones;
            $producto->categoria_id = $request->txtCategoría;
            $producto->save();

            $producto->almacens()->sync([$request->txtAlmacén]);

            return back()->with('Correcto', 'Producto actualizado correctamente');
        } catch (\Throwable $th) {
            return back()->with('Incorrecto', 'Error al actualizar el producto');
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
