
#  Moebius backend test

## Instalación
Para instalar e iniciar el proyecto se deben ejecutar los siguientes comandos:

- composer install o php artisan serve
- cp .env.example .env (o puede simplemente descargar el archivo .env y colocarlo en la carpeta root de la aplicación)
- php artisan migrate
- composer run dev

## Ambiente y requisitos

Se usaron las siguientes versiones de las herramientas:

- Ubuntu 24.04.1 LTS
- Laravel 11.31.0
- PhP 8.3.13
- MySQL 14.14 (imagen de docker sencilla)