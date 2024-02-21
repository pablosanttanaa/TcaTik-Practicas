    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CRUD - Pablo Santana</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/9ca7eb5c4d.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    </head>

    <body>
        <h1 class="text-center p-3">Listado de Productos</h1>

        @if (session('Correcto'))
            <div class="alert alert-success custom-alert alert-dismissible fade show w-50 mx-auto small" role="alert">
                {{ session('Correcto') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('Incorrecto'))
            <div class="alert alert-danger custom-alert alert-dismissible fade show w-50 mx-auto small" role="alert">
                {{ session('Incorrecto') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <script>
            var res = function() {
                var not = confirm("¿Estás seguro de querer eliminar el producto?");
                return not;
            }
        </script>

        <div class="p-5 table-responsive">
            <div class="p-3">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#modalRegistrar">
                        Añadir producto
                    </button>

                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle mx-2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Ver
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('ver.almacenes') }}">Ver almacenes</a>
                        <a class="dropdown-item" href="{{ route('ver.categorias') }}">Ver categorías</a>
                    </div>

                    <div class="input-group ms-auto" style="width: 300px;">
                        <input type="text" class="form-control" id="inputFiltro" placeholder="Buscar...">
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover">
                <caption class="caption-top text-center p-3">Productos</caption>
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Categorías</th>
                        <th scope="col">Almacén</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($datos as $item)
                        <tr class="filaProducto">
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->precio }}€</td>
                            <td>{{ $item->observaciones }}</td>
                            <td>{{ $item->categoria->nombre }}</td>
                            <td>
                                @foreach ($item->almacens as $almacen)
                                    {{ $almacen->nombre }}
                                @endforeach
                            </td>
                            <td>
                                <a href="" data-bs-toggle="modal"
                                    data-bs-target="#modalEditar{{ $item->id }}" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('crud.delete', ['id' => $item->id]) }}" onclick="return res()"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>

                            <!-- Modal de Registro de datos -->
                            <div class="modal fade" id="modalRegistrar" tabindex="-1"
                                aria-labelledby="modalEditarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEditarLabel">Añadir Producto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formularioRegistro" action="{{ route('crud.create') }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputName1" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control name-field" id="inputName1" aria-describedby="emailHelp"
                                                        name="txtNombre" required>
                                                    <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPrecio1" class="form-label">Precio</label>
                                                    <input type="text" class="form-control" id="inputPrecio1"
                                                        aria-describedby="emailHelp" name="txtPrecio" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputObservaciones1" class="form-label">Observaciones</label>
                                                    <input type="text" class="form-control" id="inputObservaciones1" aria-describedby="emailHelp"
                                                        name="txtObservaciones">
                                                    <div class="invalid-feedback">La observación no puede contener más de 50 caracteres.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputCategoría1" class="form-label">Categoría</label>
                                                    <select class="form-select" id="inputCategoría1"
                                                        name="txtCategoría" required>
                                                        <option value="">Seleccionar categoría</option>
                                                        @foreach ($categorias as $categoria)
                                                            <option value="{{ $categoria->id }}">
                                                                {{ $categoria->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputAlmacen1" class="form-label">Almacén</label>
                                                    <select class="form-select" id="inputAlmacen1" name="txtAlmacén"
                                                        required>
                                                        <option value="">Seleccionar almacén</option>
                                                        @foreach ($almacenes as $almacen)
                                                            <option value="{{ $almacen->id }}">
                                                                {{ $almacen->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal de modificación de datos -->
                            <div class="modal fade" id="modalEditar{{ $item->id }}" tabindex="-1"
                                aria-labelledby="modalEditarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEditarLabel">Actualizar datos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditar{{ $item->id }}"
                                                action="{{ route('crud.update') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id_producto"
                                                    value="{{ $item->id }}">
                                                <div class="mb-3">
                                                    <label for="inputNombre2" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control name-field" id="inputNombre2"
                                                        aria-describedby="emailHelp" name="txtNombre"
                                                        value="{{ $item->nombre }}" required>
                                                        <div class="invalid-feedback">El nombre debe tener al menos 3 caracteres.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputPrecio2" class="form-label">Precio</label>
                                                    <input type="text" class="form-control" id="inputPrecio2"
                                                        aria-describedby="emailHelp" name="txtPrecio"
                                                        value="{{ $item->precio }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputObservaciones2"
                                                        class="form-label">Observaciones</label>
                                                    <input type="text" class="form-control"
                                                        id="inputObservaciones2" aria-describedby="emailHelp"
                                                        name="txtObservaciones" value="{{ $item->observaciones }}"
                                                        >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputCategoría2" class="form-label">Categorías</label>
                                                    <select class="form-select" id="inputCategoría2"
                                                        aria-describedby="emailHelp" name="txtCategoría" required>
                                                        @foreach ($categorias as $categoria)
                                                            <option value="{{ $categoria->id }}"
                                                                {{ $item->categoria_id == $categoria->id ? 'selected' : '' }}>
                                                                {{ $categoria->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputAlmacen2" class="form-label">Almacén</label>
                                                    <select class="form-select" id="inputAlmacen2"
                                                        aria-describedby="emailHelp" name="txtAlmacén" required>
                                                        @foreach ($almacenes as $almacen)
                                                            <option value="{{ $almacen->id }}"
                                                                {{ $item->almacen_id == $almacen->id ? 'selected' : '' }}>
                                                                {{ $almacen->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Modificar</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>

            <!-- Uso del filtro -->
            $(document).ready(function() {
                $('#inputFiltro').on('keyup', function() {
                    var filtro = $(this).val().toLowerCase();
                    $('.filaProducto').hide().filter(function() {
                        return $(this).text().toLowerCase().includes(filtro);
                    }).show();
                });
            });

            <!-- Mensaje de advertencia en observacionesLength -->
            $(document).ready(function() {
                $('#inputObservaciones1, #inputObservaciones2').on('input', function() {
                    var observacionesLength = $(this).val().length;
                    if (observacionesLength > 50) {
                        $(this).addClass('is-invalid');
                        $(this).removeClass('is-valid');
                        $('#observationLengthWarning').removeClass('d-none');
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                        $('#observationLengthWarning').addClass('d-none');
                    }
                });
            });

            <!-- Mensaje de advertencia en nombreLength -->
            $(document).ready(function() {
                $('.name-field').on('input', function() {
                    var nombreLength = $(this).val().length;
                    if (nombreLength < 3) {
                        $(this).addClass('is-invalid');
                        $(this).removeClass('is-valid');
                        $('#nameLengthWarning').removeClass('d-none');
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                        $('#nameLengthWarning').addClass('d-none');
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </body>
</html>
