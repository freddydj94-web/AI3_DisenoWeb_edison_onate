# AI3 - Sistema Web de Estudiantes (CRUD)

**Estudiante:** Edison Fabricio Oñate Cañar
**Asignatura:** Sistemas Inteligentes
**Universidad:** ECOTEC

## Descripción
Módulo web full-stack desarrollado en PHP (usando PDO) y MySQL/MariaDB. Cuenta con un CRUD completo (Crear, Leer, Actualizar y Eliminar) con medidas de seguridad contra inyección SQL (Prepared Statements) y XSS (htmlspecialchars).

##  ¿Cómo ejecutar este proyecto localmente?

Sigue estos pasos para probar el sistema en tu computadora:

### Requisitos previos
- Tener instalado **XAMPP** (o WAMP/Laragon).
- Un navegador web (Chrome, Edge, etc.).

### Paso 1: Descargar y ubicar el proyecto
1. Descarga este repositorio como archivo ZIP y descomprímelo.
2. Mueve la carpeta del proyecto a tu directorio de servidor local (ej. `C:\xampp\htdocs\`).

### Paso 2: Importar la Base de Datos
1. Abre el Panel de Control de XAMPP e inicia los servicios de **Apache** y **MySQL**.
2. En tu navegador, entra a `http://localhost/phpmyadmin`.
3. Haz clic en la pestaña **Importar**.
4. Selecciona el archivo **`sql/db_sistema_web.sql`** que viene dentro de este repositorio y dale clic a **Importar**. (Esto creará la base de datos y la tabla automáticamente).

### Paso 3: Ejecutar la aplicación
1. Abre tu navegador.
2. Ingresa a la siguiente URL: 
   `http://localhost/INGRESAR DIRECCION DE LA CARPETA/views/formulario.php`
   *(Reemplaza "INGRESAR DERECCION DE LA CARPETA" por el nombre de la carpeta que descomprimiste).*
3. ¡Listo! Ya puedes interactuar con el formulario y ver los registros.

## 🛠️ Tecnologías utilizadas
- **PHP 8** (Arquitectura modular, PDO).
- **MySQL / MariaDB**.
- **HTML5 / CSS3**.
- **Git / GitHub**.
