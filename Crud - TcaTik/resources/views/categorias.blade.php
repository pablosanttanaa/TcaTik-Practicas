<!-- resources/views/categorias.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9ca7eb5c4d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>

<body>
    <script>
        var res = function() {
            var not = confirm("¿Estás seguro de querer eliminar la categoria?");
            return not;
        }
    </script>
    <div class="container">
        <h1 class="text-center p-3">Listado de Categorías</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-50 mx-auto small" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto small" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
            data-bs-target="#modalCrearCategoria">
            Añadir categoría
        </button>

        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Ver
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('crud.index') }}">Ver productos</a>
            <a class="dropdown-item" href="{{ route('ver.almacenes') }}">Ver almacenes</a>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <caption class="caption-top text-center p-3">Categorías</caption>
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <form action="{{ route('delete.categoria', ['id' => $categoria->id]) }}" method="POST"
                                onsubmit="return res()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal para crear categoría -->
    <div class="modal fade" id="modalCrearCategoria" tabindex="-1" aria-labelledby="modalCrearCategoriaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCrearCategoriaLabel">Crear Categoría
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para crear categoría -->
                    <form id="formularioCrearCategoria" action="{{ route('create.categoria') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputNombreCategoria" class="form-label">Nombre de la
                                categoría</label>
                            <input type="text" class="form-control" id="inputNombreCategoria"
                                name="txtNombreCategoria" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear
                                Categoría</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
