# 🚀 CanisBoutique - Panel de Administración & E-commerce

Este proyecto utiliza **Laravel Sail** y se ejecuta completamente dentro de contenedores de **Docker**, garantizando que el entorno de desarrollo sea idéntico en cualquier sistema operativo.

## 1\. ⚙️ Requisitos del Sistema

| Requisito | Entorno | Nota |
| :--- | :--- | :--- |
| **Docker Desktop** | **Windows** | Necesario para ejecutar los contenedores vía WSL 2. |
| **Docker Engine** | **Ubuntu Nativo** | Necesario si no se usa Docker Desktop. |
| **Terminal** | **Windows (WSL/Ubuntu)** o **Linux (Terminal Nativa)** | Todos los comandos de `sail` deben ejecutarse desde un *shell* de Linux. |

-----

## 2\. 🔑 Configuración y Preparación Inicial

Esta sección se ejecuta **una sola vez** después de clonar el repositorio.

### A. Alineación de Entorno (`.env`)

El archivo `.env` es crucial para la conexión. Debe alinearse con los nombres de los servicios Docker.

1.  Copia el archivo de configuración de ejemplo:
    ```bash
    cp .env.example .env
    ```
2.  **Verificación de Base de Datos:** El archivo `.env` **debe** utilizar el nombre del servicio Docker:
    ```env
    DB_HOST=mysql
    DB_USERNAME=sail
    DB_PASSWORD=password <- Escribir password en minúsculas
    ```
    *Si su host fuera `127.0.0.1` o `localhost`, la comunicación interna entre contenedores fallaría.*

### B. Instalación de Dependencias

Siempre use **Sail** para instalar dependencias. Esto asegura que se utilicen las versiones correctas de PHP y Node/pnpm que están dentro de Docker.

1.  **Instalar dependencias de PHP (Composer):**
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    ```
2.  **Instalar dependencias de Node (pnpm):**
    ```bash
    ./vendor/bin/sail pnpm install
    ```

-----

## 3\. 🏁 Puesta en Marcha (Arranque Simplificado y a Prueba de Fallos)

El *script* **`start.sh`** automatiza todos los pasos de arranque, migración y *seeding*. Está diseñado para ser a prueba de fallos contra el error persistente de "Connection refused" en Docker/WSL.

### A. Preparar el Script

1.  Haga que el *script* sea ejecutable (una sola vez):
    ```bash
    chmod +x start.sh
    ```

### B. Ejecutar el Proyecto (Comando Único)

Ejecute este comando en la terminal **WSL/Ubuntu o Nativa de Linux**:

```bash
./start.sh
```

**Lo que hace el script `start.sh`:**

| Comando | Propósito | Beneficio (Control de Fallos) |
| :--- | :--- | :--- |
| `./vendor/bin/sail up -d` | Levanta todos los contenedores (Web, DB, Adminer). | *Necesario para tener los servicios activos.* |
| `sleep 15` | **Fuerza una pausa de 15 segundos.** | **CLAVE:** Da tiempo al servicio MySQL para inicializarse por completo. Esto previene el error `Connection refused`. |
| `./vendor/bin/sail artisan migrate:fresh --seed` | Crea toda la estructura de la DB y carga los datos de prueba (incluyendo el usuario Admin). | *Garantiza que la aplicación tenga datos con los que trabajar.* |
| `./vendor/bin/sail npm run dev` | Inicia Vite. | *Necesario para compilar el CSS/JS de Tailwind y habilitar la recarga automática (HMR).* |

-----

## 4\. 🌐 Acceso y Credenciales

Una vez que el *script* `start.sh` muestre que Vite está listo, puede acceder a la aplicación.

| Servicio | URL |
| :--- | :--- |
| **Aplicación Web** | `http://localhost` |
| **Panel de Administración** | `http://localhost/login` |
| **Visor de Base de Datos (Adminer)** | `http://localhost:8080` |

### Credenciales de Adminer Base de Datos
Servidor: mysql
Usuario: sail
Contraseña: password
Base de datos: canisboutique

### Credenciales de Administrador

| Campo | Valor |
| :--- | :--- |
| **Email** | `admin@canisboutique.com` |
| **Contraseña** | `password` |

-----

Tu documentación está completa y lista. ¿Continuamos con el desarrollo del **Módulo de Compra**?