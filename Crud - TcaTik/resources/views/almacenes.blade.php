<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Almacenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9ca7eb5c4d.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>

<script>
    var res = function() {
        var not = confirm("¿Estás seguro de querer eliminar el almacen?");
        return not;
    }
</script>

<body>
    <div class="container">
        <h1 class="text-center p-3">Listado de Almacenes</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show w-50 mx-auto small" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearAlmacen">
            Añadir almacén
        </button>

        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Ver
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('crud.index') }}">Ver productos</a>
        <a class="dropdown-item" href="{{ route('ver.categorias') }}">Ver categorias</a>
    </div>
        <table class="table table-striped table-bordered table-hover">
            <caption class="caption-top text-center p-3">Almacenes</caption>
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->id }}</td>
                        <td>{{ $almacen->nombre }}</td>
                        <td>
                            <form action="{{ route('delete.almacen', ['id' => $almacen->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return res()"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para añadir almacén -->
    <div class="modal fade" id="modalCrearAlmacen" tabindex="-1" aria-labelledby="modalCrearAlmacenLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCrearAlmacenLabel">Añadir Almacén</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create.almacen') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputNombreAlmacen" class="form-label">Nombre del Almacén</label>
                            <input type="text" class="form-control" id="inputNombreAlmacen" name="txtNombreAlmacen"
                                required>
                        </div>
                        <button type="submit" class="btn btn-success">Crear Almacén</button>
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