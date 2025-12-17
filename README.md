# 🐾 CanisBoutique - Panel de Administración & E-commerce

Este proyecto es una plataforma integral de gestión y venta para mascotas. Utiliza **Laravel Sail** y se ejecuta completamente dentro de contenedores de **Docker**, garantizando un entorno de desarrollo idéntico en cualquier sistema operativo (Ubuntu/Windows WSL2).

## 🚀 1. Requisitos y Preparación Inicial

### Requisitos del Sistema
| Requisito | Nota |
| :--- | :--- |
| **Docker Desktop / Engine** | Necesario para ejecutar los contenedores. |
| **Terminal Linux** | WSL2 (Windows) o Terminal Nativa (Ubuntu). |

### Instalación Rápida
1. **Clonar y configurar entorno:**
   
   ```bash
   cp .env.example .env
   # Asegúrate que DB_HOST=mysql en tu .env

```

2. **Instalar dependencias de PHP vía Docker:**
```bash
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs

```

## 🏁 2. Puesta en Marcha (Script Automático)

Hemos desarrollado un script `start.sh` para evitar errores de conexión con MySQL.

1. **Otorgar permisos:** `chmod +x start.sh`
2. **Ejecutar:** `./start.sh`

Este comando levanta los contenedores, espera la inicialización de la DB, ejecuta las migraciones con **Seeders de Roles/Productos** e inicia Vite.

---

## 🔐 3. Lógica de Negocio y Seguridad (RBAC)

El sistema implementa un control de acceso basado en roles (Spatie) y **Middlewares personalizados** para proteger la integridad del negocio.

### Matriz de Permisos

| Rol | Usuarios | Productos | Turnos | Roles/Ajustes |
| --- | --- | --- | --- | --- |
| **Super Admin** | ✅ (Total) | ✅ | ✅ | ✅ |
| **Admin** | ✅ (Limitado) | ✅ | ✅ | ✅ |
| **Vendedor** | 👁️ (Lectura) | ✅ (Gestión) | ❌ | ❌ |
| **Peluquero** | 👁️ (Lectura) | ❌ | ✅ (Gestión) | ❌ |

### Blindaje de Seguridad

* **Middleware `BloquearRol`:** Restringe accesos por URL directa según el rol (ej. Vendedor no puede entrar a `/admin/turnos`).
* **Protección de Jerarquía:** Los roles Vendedor/Peluquero no pueden ver ni editar a usuarios con rol ADMIN o SUPER ADMIN.
* **Protección de SuperUsuario:** El sistema bloquea cualquier intento de eliminar al Super Administrador (ID 1).

---

## 🛠️ 4. Tecnologías y Estructura

* **Core:** Laravel 12 (PHP 8.4)
* **Seguridad:** Spatie Laravel-Permission & Middlewares personalizados.
* **Frontend:** Blade, Bootstrap 5, SweetAlert2 (Notificaciones interactivas).
* **Herramientas:** - **Sail:** Gestión de contenedores.
* **Adminer:** Visor de DB en `http://localhost:8080`.

---

## 🌐 5. Acceso y Credenciales

| Servicio | URL |
| --- | --- |
| **Web App** | `http://localhost` |
| **Admin Panel** | `http://localhost/admin` |

### Credenciales de Prueba

| Rol | Email | Password |
| --- | --- | --- |
| **Super Admin** | `admin@admin.com` | `dada` |
| **Vendedor** | `vendedor@vendedor.com` | `dada` |
| **Peluquero** | `peluquero@peluquero.com` | `dada` |
| **Cliente** | `cliente@cliente.com` | `dada` |

---

## 👤 Autor

**Gonzalo Reynoso** - *KensiWeb*
Analista de Sistemas & Desarrollador Web.

## Galería de imágenes.

<img width="1331" height="854" alt="image" src="https://github.com/user-attachments/assets/11ce1765-a083-4254-a72b-3704e6bae6f9" />

<img width="1369" height="825" alt="image" src="https://github.com/user-attachments/assets/03d4866d-e19b-4673-a8da-018e3891ae96" />

<img width="1339" height="1064" alt="image" src="https://github.com/user-attachments/assets/17305658-e4ac-4e80-a878-cc9bccdb54ff" />

<img width="1353" height="754" alt="image" src="https://github.com/user-attachments/assets/fc0239f9-9e27-41fd-9a10-771dc35086e2" />

<img width="1372" height="672" alt="image" src="https://github.com/user-attachments/assets/a94f88a9-50e0-4afa-b2df-28927b22d986" />

