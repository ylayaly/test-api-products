# API DE PRODUCTOS - PRUEBA TECNICA LARAVEL BACKEND

Api RESTful para la gestión de productos y sus precios en múltiples divisas, desarrollada con la ultima versión de laravel (v 13.17)

## FUNCIONALIDADES

- CRUD completo de productos
- Gestión (Creación y lectura) de precios de productos en múltiples divisas. 
    Divisas disponibles: 'USD', 'EUR', 'JPY', 'GBP', 'CNY', 'AUD', 'CAD', 'CHF', 'HKD', 'SGD', 'MXN', 'BRL', 'INR', 'KRW'
- Validación de datos con Form Requests
- Formato de respuestas con API Resources
- Documentación automática con Scramble - Swagger
- Tests automatizados con PHPUnit
- Base de datos en SQLite para su facil configuración y demostración

## Requisitos

- PHP 8.3 o superior
- Composer 2.x

## Instalación 

1. Clonar el repositorio

```bash
git clone https://github.com/ylayaly/test-api-products.git
cd test-api-products
```

2. Instalar el proyecto y sus dependencias
```bash
composer install
```

3. Configurar el archivo .env
```bash
cp .env.example .env
php artisan key:generate
```

4. Instalar las migraciones y datos de prueba
```bash
php artisan migrate
php artisan db:seed
```

5. Iniciar el servidor
```bash
php artisan serve
```
## Documentación

Consultar la documentacion en 
http://localhost:8000/docs/api


## Ejecutar todos los test

```bash
php artisan test
```