# 📦 PracticaDAW — Gestión de Inventario con Reportes en PDF

Proyecto práctico en Laravel enfocado en dominar el patrón MVC y las operaciones CRUD, aplicado a la gestión de productos, proveedores y empleados, con generación de reportes en PDF.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)
![DomPDF](https://img.shields.io/badge/Reportes-DomPDF-EC1C24?style=flat)
![Estado](https://img.shields.io/badge/Estado-Proyecto%20pr%C3%A1ctico-blue?style=flat)

---

## 📋 Descripción

Proyecto de práctica orientado a reforzar el patrón **MVC** y las operaciones **CRUD** en Laravel mediante un sistema simple de inventario, con tres entidades principales: **Productos**, **Proveedores** y **Empleados**. Cada entidad cuenta además con su propio reporte exportable en PDF.

> 📸 *Capturas de pantalla — próximamente.*

---

## ⚙️ Funcionalidades

- CRUD completo (crear, listar, editar, eliminar) para **Productos**, **Proveedores** y **Empleados**.
- Generación de **reportes en PDF** por entidad, usando Laravel DomPDF:
  - Reporte de productos
  - Reporte de proveedores
  - Reporte de empleados

---

## 🛠️ Stack tecnológico

- **Backend:** Laravel 12, PHP 8.2
- **Base de datos:** MySQL
- **Reportes:** `barryvdh/laravel-dompdf`
- **Frontend:** Blade

---

## 🔗 Rutas principales

| Recurso     | Tipo                          | Descripción                          |
|-------------|-------------------------------|----------------------------------------|
| `/producto`   | `Route::resource` (7 rutas)  | CRUD completo de productos             |
| `/proveedor`  | `Route::resource` (7 rutas)  | CRUD completo de proveedores           |
| `/empleado`   | `Route::resource` (7 rutas)  | CRUD completo de empleados             |
| `/reporte-producto`  | `GET` | Genera y muestra el PDF de productos   |
| `/reporte-proveedor` | `GET` | Genera y muestra el PDF de proveedores |
| `/reporte-empleados` | `GET` | Genera y muestra el PDF de empleados   |

---

## 🚀 Instalación y ejecución

**Requisitos:** PHP 8.2+, Composer, MySQL (XAMPP/Laragon).

1. Clonar el repositorio e instalar dependencias:
   ```bash
   git clone https://github.com/isac-deodanes/practicaDaw.git
   cd practicaDaw
   composer install
   ```
2. Copiar `.env.example` a `.env` y configurar la conexión a la base de datos.
3. Generar la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```
4. Ejecutar las migraciones:
   ```bash
   php artisan migrate
   ```
5. Levantar el servidor:
   ```bash
   php artisan serve
   ```

---

## 👨‍💻 Autor

**Isaac Dagoberto Deodanes Benitez**
Desarrollador Full Stack Jr
📧 isacdeodanes@gmail.com · 💻 [GitHub](https://github.com/isac-deodanes) · 🔗 [LinkedIn](https://www.linkedin.com/in/isaac-deodanes-a31a26379/)
