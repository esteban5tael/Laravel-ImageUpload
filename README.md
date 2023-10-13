# Gestión de Imágenes en Laravel

**Proyecto de Ejemplo por Juan Benjumea Correa**

## Descripción

Este repositorio es una muestra de un proyecto de desarrollo web en Laravel que se centra en la gestión de imágenes. El objetivo principal es proporcionar un ejemplo completo de cómo subir, eliminar y actualizar imágenes en una aplicación web construida con el framework Laravel. El proyecto incluye un formulario que permite a los usuarios crear registros en una base de datos, incluyendo el campo de imagen, y demuestra cómo llevar a cabo estas operaciones de manera efectiva.

## Funcionalidades Destacadas

-   Subida de Imágenes: Los usuarios pueden cargar imágenes desde sus dispositivos y se almacenan en la aplicación.
-   Eliminación de Imágenes: Permite a los usuarios eliminar imágenes previamente subidas.
-   Actualización de Registros: Ofrece la capacidad de actualizar registros existentes, incluyendo la imagen asociada.
-   Almacenamiento Seguro: Las imágenes se almacenan de manera segura en el servidor utilizando Laravel.
-   Interfaz de Usuario Intuitiva: La aplicación web incluye una interfaz de usuario fácil de usar para una experiencia de usuario fluida.

## Tecnologías Utilizadas

-   **Laravel:** Como el framework principal para el desarrollo de la aplicación web.
-   **PHP:** Lenguaje de programación para la lógica del servidor.
-   **HTML, CSS, JavaScript:** Para la creación de la interfaz de usuario y la experiencia del usuario.
-   **Bases de Datos:** SQLite.

## Comandos y Configuraciones

1. composer create-project laravel/laravel ImageUpload
2. composer require jeroennoten/laravel-adminlte && php artisan adminlte:install
3. composer require ibex/crud-generator --dev && php artisan vendor:publish --tag=crud
4. composer require laravelcollective/html
5. php artisan storage:link
6. CONFIGURACIONES
   .env
   base de datos

    app.config
    timezone

7. php artisan make:migration create_images_table
8. php artisan migrate
9. php artisan make:crud images
