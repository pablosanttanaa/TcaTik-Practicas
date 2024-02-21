# Tca-Tik: Gestión de Productos, Almacenes y Categorías con Laravel

¡Bienvenido/a a Tca-Tik! 😀 Este proyecto es un sistema de gestión desarrollado en Laravel que te permite administrar productos, almacenes y categorías mediante un sistema CRUD.

## Requerimientos del Ejercicio

Para este ejercicio, se debe crear un CRUD desde cero para gestionar productos, almacenes y categorías, teniendo en cuenta las siguientes consideraciones:

- Un producto tiene una categoría y puede estar en varios almacenes.
- Los campos de un producto son: nombre, precio, observaciones, categoría a la que pertenece y almacenes en los que se encuentra.
- Los almacenes y categorías deben tener una tabla en la base de datos y estar relacionadas con la tabla de productos.
- Crear una página para ver todos los productos en una tabla con opciones de editar y borrar.
- Crear una página con un formulario para crear y editar productos.
- Crear seeders o factories para llenar la base de datos con datos de prueba.
- Emplear validaciones en el formulario usando jQuery para evitar enviar campos vacíos y asegurar que el nombre tenga al menos 3 caracteres.
- El diseño es libre, utilizando Bootstrap o cualquier hoja de estilos deseada.
- Las relaciones entre tablas deben nombrarse productos_has_X.
- El entorno de trabajo es Laragon y MySQL con el visualizador de HeidiSQL.

## Instrucciones para Ejecutar el Proyecto

1. Clonar este repositorio en tu entorno de desarrollo local.
2. Configurar el archivo `.env` con los datos de conexión a la base de datos.
3. Ejecutar las migraciones para crear las tablas en la base de datos: `php artisan migrate`.
4. Ejecutar los seeders para llenar la base de datos con datos de prueba: `php artisan db:seed`.
5. Iniciar el servidor de desarrollo de Laravel: `php artisan serve`.
6. Acceder a la aplicación desde tu navegador.
