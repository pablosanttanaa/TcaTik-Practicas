<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function showAll(Request $request)
    {
        // Obtener el número de elementos por página
        $perPage = 10;

        // Si se proporciona un parámetro "page" en la solicitud, usarlo como página actual,
        // de lo contrario, establecer la página actual en 1
        $currentPage = $request->input('page', 1);

        // Establecer el número de elementos por página
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        // Obtener los almacenes paginados
        $almacenes = Almacen::paginate($perPage);

        // Verificar si la página actual está vacía y no es la página número 1
        if ($almacenes->isEmpty() && $currentPage > 1) {
            // Redirigir a la página anterior
            return Redirect::to($almacenes->previousPageUrl());
        }

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

            // Obtener el número total de almacenes
            $totalAlmacenes = Almacen::count();

            // Calcular el número total de páginas
            $totalPages = ceil($totalAlmacenes / 10);

            // Redirigir a la última página
            return redirect()
                ->route('ver.almacenes', ['page' => $totalPages])
                ->with('Correcto', 'Almacén creado correctamente');
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

            $currentPage = request()->get('page', 1); // Obtener el número de la página actual

            // Redirigir a la página anterior si la página actual está vacía y no es la página número 1
            if ($almacen->isEmpty() && $currentPage > 1) {
                return Redirect::to($almacen->previousPageUrl());
            }

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
