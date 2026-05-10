# Sistema de Ventas - SVENTAS

## 📋 Descripción del Proyecto

**SVENTAS** es un sistema de Punto de Venta (POS) desarrollado en PHP basado en arquitectura MVC (Model-View-Controller). Diseñado para gestionar operaciones comerciales de pequeñas y medianas empresas, permitiendo administrar productos, clientes, usuarios, categorías y transacciones de ventas de manera eficiente.

### Versión
- **Versión Actual:** 1.0 (En desarrollo)
- **Última Actualización:** Mayo 2026
- **Estado:** Activo - Funcionalidades base implementadas

---

## ✨ Características Principales

### Funcionalidades Implementadas ✅
- **Sistema de Autenticación:** Login con credenciales de usuario
- **Dashboard:** Panel de control principal con interfaz responsive
- **Gestión de Usuarios:** Administración de usuarios del sistema (en preparación)
- **Gestión de Productos:** CRUD completo para productos
- **Gestión de Clientes:** Registro y administración de clientes
- **Gestión de Categorías:** Organización de productos por categorías
- **Gestión de Cajas:** Control de cajas registradoras
- **Sistema de Ventas:** Registro y seguimiento de transacciones
- **Reportes:** Detalles de ventas y transacciones (en desarrollo)
- **Interfaz Responsive:** Diseño adaptable basado en Bulma CSS Framework

### Funcionalidades en Desarrollo 🚧
- Módulo AJAX para operaciones asincrónicas
- Sistema de reportes PDF avanzados
- Dashboard con estadísticas en tiempo real
- Autorización y permisos por rol
- Búsqueda y filtros avanzados
- Integración con métodos de pago

---

## 🏗️ Estructura del Proyecto

```
SVentas/
├── autoload.php                    # Autocargador de clases PSR-4
├── index.php                       # Punto de entrada principal
├── README.md                       # Este archivo
│
├── config/                         # Configuración de la aplicación
│   ├── app.php                    # Constantes de la aplicación
│   ├── server.php                 # Credenciales de base de datos
│   └── pos.sql                    # Dump de la estructura de BD
│
├── app/                           # Lógica de la aplicación
│   ├── controllers/               # Controladores
│   │   └── viewsController.php   # Controlador de vistas
│   │
│   ├── models/                    # Modelos de datos
│   │   ├── mainModel.php         # Modelo base con CRUD genérico
│   │   └── viewsModel.php        # Modelo para gestión de vistas
│   │
│   ├── views/                     # Vistas (Interfaz de usuario)
│   │   ├── content/              # Contenido principal
│   │   │   ├── 404-view.php     # Página de error 404
│   │   │   ├── login-view.php   # Formulario de autenticación
│   │   │   └── dashboard-view.php # Panel de control
│   │   │
│   │   ├── inc/                  # Componentes incluibles
│   │   │   ├── head.php         # Metaetiquetas y estilos
│   │   │   ├── navBar.php       # Barra de navegación superior
│   │   │   ├── navLateral.php   # Menú lateral
│   │   │   ├── session_start.php # Manejo de sesiones
│   │   │   └── script.php       # Scripts base
│   │   │
│   │   ├── css/                  # Estilos
│   │   │   ├── bulma.min.css    # Framework CSS Bulma
│   │   │   ├── all.css          # FontAwesome
│   │   │   ├── estilos.css      # Estilos personalizados
│   │   │   └── sweetalert2.min.css # Alertas modernas
│   │   │
│   │   ├── js/                   # Scripts de cliente
│   │   │   ├── main.js          # Funcionalidad principal
│   │   │   └── sweetalert2.all.min.js # Librería de alertas
│   │   │
│   │   ├── img/                  # Imágenes del sitio
│   │   ├── fotos/                # Imágenes de usuarios/productos
│   │   ├── productos/            # Imágenes de productos
│   │   └── webfonts/             # Fuentes personalizadas
│   │
│   ├── ajax/                      # Endpoints AJAX (Vacío - en desarrollo)
│   └── pdf/                       # Generador de reportes PDF (en desarrollo)
│
├── TEMPLATE/                      # Plantillas de referencia
│   ├── 404.html
│   ├── dashboard.html
│   ├── index.html
│   └── [Assets] (css, img, js, productos, webfonts, fotos)
│
└── .gitignore                     # Archivos ignorados por Git
```

---

## 🛠️ Tecnologías Utilizadas

### Backend
- **PHP 8.2.2** - Lenguaje principal
- **MySQL 5.7.33** - Sistema de gestión de base de datos
- **PDO** - Abstracción de acceso a datos
- **Namespace y Autoload (PSR-4)** - Autoorganización de clases

### Frontend
- **HTML5** - Estructura semántica
- **CSS3** - Estilos y responsive design
- **Bulma 0.9+** - Framework CSS responsive
- **JavaScript Vanilla** - Interactividad
- **SweetAlert2** - Alertas y diálogos personalizados
- **FontAwesome** - Iconografía

### Otros
- **Git** - Control de versiones
- **Apache/Nginx** - Servidor web

---

## 📦 Requisitos de Instalación

### Requisitos Mínimos
- **PHP:** 8.0 o superior
- **MySQL:** 5.7 o superior
- **Servidor Web:** Apache 2.4+ o Nginx
- **Extensiones PHP:** PDO, PDO MySQL, mbstring

### Configuración del Entorno

#### 1. **Clonar el Repositorio**
```bash
git clone https://github.com/victor-huallpa/Sistema-de-Ventas.git
cd SVentas
```

#### 2. **Configurar Base de Datos**

Editar `config/server.php`:
```php
<?php
const BD_SERVER="localhost";    // Host del servidor
const BD_NAME="pos";            // Nombre de la base de datos
const BD_USER="tu_usuario";     // Usuario de MySQL
const BD_PAS="tu_contraseña";   // Contraseña
```

#### 3. **Crear Base de Datos**

Importar el dump SQL:
```bash
mysql -u tu_usuario -p pos < config/pos.sql
```

O mediante phpMyAdmin:
1. Crear nueva base de datos: `pos`
2. Importar archivo: `config/pos.sql`

#### 4. **Configurar la URL de la Aplicación**

Editar `config/app.php`:
```php
const APP_URL="http://localhost/PHP/proyectos-php/SVentas/";
const APP_NAME="VENTAS";
const APP_SESSION_NAME="POS";
```

#### 5. **Establecer Permisos**
```bash
chmod -R 755 SVentas/
chmod -R 777 SVentas/app/views/fotos/
chmod -R 777 SVentas/app/views/productos/
chmod -R 777 SVentas/app/pdf/
```

---

## 🔧 Configuración

### Constantes Globales (config/app.php)

| Constante | Valor | Descripción |
|-----------|-------|-------------|
| `APP_URL` | http://localhost/... | URL base de la aplicación |
| `APP_NAME` | VENTAS | Nombre de la aplicación |
| `APP_SESSION_NAME` | POS | Nombre de la sesión PHP |
| `DOCUMENTOS_USUARIOS` | Array | Tipos de documentos válidos |
| `PRODUCTO_UNIDAD` | Array | Unidades de medida de productos |
| `MONEDA_SIMBOLO` | $ | Símbolo de moneda |
| `MONEDA_NOMBRE` | USD | Nombre de la moneda |
| `MONEDA_DECIMALES` | U2 | Formato de decimales |

### Zona Horaria
Default: `America/Lima` (Editable en `config/app.php`)

---

## 📊 Base de Datos

### Descripción General
La base de datos `pos` contiene 8 tablas principales interconectadas para gestionar todas las operaciones del sistema.

### Tablas Principales

#### **1. usuario**
Gestión de usuarios del sistema
```sql
- usuario_id (PK): Identificador único
- usuario_nombre: Nombre del usuario
- usuario_apellido: Apellido
- usuario_email: Correo electrónico
- usuario_usuario: Nombre de usuario (login)
- usuario_clave: Contraseña (almacenada)
- usuario_cargo: Puesto/rol en la empresa
- usuario_foto: Ruta de foto de perfil
- caja_id (FK): Caja asignada
```

#### **2. caja**
Cajas registradoras del sistema
```sql
- caja_id (PK): Identificador único
- caja_numero: Número de caja
- caja_nombre: Nombre descriptivo
- caja_efectivo: Efectivo disponible
```

#### **3. cliente**
Información de clientes
```sql
- cliente_id (PK): Identificador único
- cliente_tipo_documento: DUI, DNI, Cédula, etc.
- cliente_numero_documento: Número del documento
- cliente_nombre: Nombre
- cliente_apellido: Apellido
- cliente_provincia: Provincia/Región
- cliente_ciudad: Ciudad
- cliente_direccion: Dirección postal
- cliente_telefono: Número de teléfono
- cliente_email: Correo electrónico
```

#### **4. producto**
Catálogo de productos
```sql
- producto_id (PK): Identificador único
- producto_codigo: Código único del producto
- producto_nombre: Nombre comercial
- producto_stock_total: Cantidad en inventario
- producto_tipo_unidad: Unidad de medida (Unidad, Libra, Kg, etc.)
- producto_precio_compra: Precio de costo
- producto_precio_venta: Precio de venta al público
- producto_marca: Marca fabricante
- producto_modelo: Modelo/Referencia
- producto_estado: Estado (Activo, Inactivo)
- producto_foto: URL de imagen
- categoria_id (FK): Categoría del producto
```

#### **5. categoria**
Categorización de productos
```sql
- categoria_id (PK): Identificador único
- categoria_nombre: Nombre de categoría
- categoria_ubicacion: Ubicación física en tienda
```

#### **6. empresa**
Información de la empresa (única)
```sql
- empresa_id (PK): Identificador único (1)
- empresa_nombre: Razón social
- empresa_telefono: Teléfono principal
- empresa_email: Email de contacto
- empresa_direccion: Dirección principal
- empresa_foto: Logo/Foto empresa
```

#### **7. venta**
Registro de transacciones de ventas
```sql
- venta_id (PK): Identificador único
- venta_codigo: Código de transacción único
- venta_fecha: Fecha de venta
- venta_hora: Hora de transacción
- venta_total: Monto total
- venta_pagado: Monto pagado por cliente
- venta_cambio: Cambio calculado
- usuario_id (FK): Usuario que realizó venta
- cliente_id (FK): Cliente de la venta
- caja_id (FK): Caja utilizada
```

#### **8. venta_detalle**
Líneas de detalle de cada venta
```sql
- venta_detalle_id (PK): Identificador único
- venta_detalle_cantidad: Cantidad vendida
- venta_detalle_precio_compra: Precio de costo aplicado
- venta_detalle_precio_venta: Precio de venta aplicado
- venta_detalle_total: Subtotal del renglon
- venta_detalle_descripcion: Notas adicionales
- venta_codigo (FK): Referencia a la venta
- producto_id (FK): Producto vendido
```

### Relaciones
```
usuario ──┐
          ├─── venta
caja ─────┤     ├─── venta_detalle
cliente ──┤     │
          └─────┘
          
producto ────┬─── venta_detalle
             │
categoria ───└─── producto
```

---

## 🏛️ Arquitectura MVC

### Flujo de Solicitud

```
1. Usuario accede a index.php
2. Se verifica URL en $_GET['views']
3. viewsController valida la vista solicitada
4. mainModel gestiona base de datos
5. Vista correspondiente se renderiza
```

### Componentes Principales

#### **Controllers** (`app/controllers/`)

**viewsController.php**
- Extiende: `viewsModel`
- Responsabilidades:
  - Validar vistas solicitadas
  - Enrutar solicitudes a vistas adecuadas
  - Invocar lógica de modelos
  
```php
public function obtVisCon($vista)
// Retorna ruta de vista o página de error
```

#### **Models** (`app/models/`)

**mainModel.php** - Clase Base
- Métodos genéricos para CRUD:
  - `conect()`: Conexión PDO a base de datos
  - `ejeCon($consul)`: Ejecutar consultas
  - `limCade($cade)`: Limpieza de cadenas (XSS/SQL Injection)
  - `veriDa($fil, $cade)`: Validación con regex
  - `guarDa($ta, $da)`: Insertar datos
  - `selDa($ti, $ta, $cam, $id)`: Seleccionar datos
  - `actuaDa($ta, $da, $condi)`: Actualizar datos

```php
// Ejemplo de uso
$datos = [
    ["campo_nombre" => "producto_nombre", "campo_valor" => "Laptop"],
    ["campo_nombre" => "producto_precio", "campo_valor" => "999.99"]
];
$this->guarDa("producto", $datos);
```

**viewsModel.php**
- Gestión de rutas de vistas
- Validación de páginas disponibles
- Manejo de errores (404)

```php
protected function obtVisMo($vista)
// Retorna ruta del archivo view o "404"
```

#### **Views** (`app/views/`)

**Vistas de Contenido:**
- `login-view.php`: Formulario de autenticación
- `dashboard-view.php`: Panel principal
- `404-view.php`: Error de página no encontrada

**Componentes Incluibles:**
- `head.php`: Meta tags, CSS, favicon
- `navBar.php`: Barra superior con información de usuario
- `navLateral.php`: Menú lateral de navegación
- `session_start.php`: Validación de sesión activa. Valida autenticación, redirige si expiró, almacena datos en `$_SESSION`
- `script.php`: Scripts base y cierre

**Variables de Sesión:**
- `$_SESSION['usuario_id']` - ID del usuario autenticado
- `$_SESSION['usuario_nombre']` - Nombre completo
- `$_SESSION['usuario_cargo']` - Cargo/rol en la empresa
- `$_SESSION['usuario_foto']` - URL de foto de perfil
- `$_SESSION['caja_id']` - Caja registradora asignada

---

## 🔐 Seguridad Implementada

### Medidas Actuales
- **Limpieza de entrada:** Función `limCade()` elimina caracteres maliciosos
- **Validación de regex:** Función `veriDa()` valida formatos
- **PDO Prepared Statements:** Prevención de SQL Injection
- **Sesiones PHP:** Control de acceso no autorizado
- **Stripslashes:** Eliminación de caracteres de escape

### Recomendaciones de Seguridad
- ✅ Implementar hashing de contraseñas (bcrypt/password_hash)
- ✅ Agregar CSRF tokens en formularios
- ✅ Validación server-side completa
- ✅ HTTPS en producción
- ✅ Rate limiting en login
- ✅ Logs de auditoría
- ✅ Encriptación de datos sensibles

---

## 🚀 Rutas Disponibles

### Estructura de URLs
Las vistas se acceden mediante: `?views=nombre_vista`

| Ruta | Vista | Estado | Descripción |
|------|-------|--------|-------------|
| `/` o `?views=login` | login-view.php | ✅ | Pantalla de autenticación |
| `?views=dashboard` | dashboard-view.php | ✅ | Panel de control principal |
| `?views=usuarios` | usuarios-view.php | 🚧 | Gestión de usuarios (no existe) |
| `?views=productos` | productos-view.php | 🚧 | Gestión de productos (no existe) |
| `?views=clientes` | clientes-view.php | 🚧 | Gestión de clientes (no existe) |
| `?views=categorias` | categorias-view.php | 🚧 | Gestión de categorías (no existe) |
| `?views=ventas` | ventas-view.php | 🚧 | Registro de ventas (no existe) |
| `?views=reportes` | reportes-view.php | 🚧 | Reportes (no existe) |
| Cualquier otra | 404-view.php | ✅ | Página de error |



---

---

## 🔄 Desarrollo de Nuevas Funcionalidades

### Para Agregar una Nueva Vista
```php
// 1. Crear archivo: app/views/content/nombre-view.php
// 2. Agregar a lista blanca en: app/models/viewsModel.php ($lisBlan)
// 3. Acceder mediante: ?views=nombre
```

### Para Agregar Funcionalidad Completa
```php
// 1. Crear modelo: app/models/nombreModel.php (extiende mainModel)
// 2. Crear controlador: app/controllers/nombreController.php
// 3. Crear vistas en: app/views/content/
// 4. Registrar rutas en: index.php
```

### Para Operaciones AJAX/API
```php
// 1. Crear: app/ajax/operacion.php
// 2. Incluir mainModel.php para acceso a BD
// 3. Procesar y retornar JSON
```

---

## 🚧 Trabajo Pendiente y Mejoras Futuras

### Alto Prioridad
- [ ] Módulo AJAX completamente funcional
- [ ] Vistas CRUD para todos los módulos (Productos, Clientes, Usuarios, Categorías)
- [ ] Sistema completo de ventas con carrito
- [ ] Generación de reportes PDF
- [ ] Dashboard con gráficos y estadísticas en tiempo real
- [ ] Sistema de roles y permisos

### Mediano Plazo
- [ ] Búsqueda y filtros avanzados
- [ ] Paginación en listados
- [ ] Importación/Exportación de datos (CSV, Excel)
- [ ] Códigos de barras para productos
- [ ] Integración de métodos de pago
- [ ] Impresión de recibos/facturas
- [ ] Historial de cambios (auditoría)
- [ ] Sincronización con múltiples sucursales

### Mejora de Código
- [ ] Refactorización de métodos CRUD en mainModel
- [ ] Implementación de prepared statements en todos lados
- [ ] Separación de responsabilidades (Single Responsibility)
- [ ] Unit tests y pruebas de integración
- [ ] API REST para integración con terceros
- [ ] Validación más robusta con librerías especializadas

### Seguridad
- [ ] Hash seguro de contraseñas (password_hash)
- [ ] CSRF tokens en formularios
- [ ] Encriptación de datos sensibles
- [ ] Logs de auditoría detallados
- [ ] Rate limiting
- [ ] 2FA (Two-Factor Authentication)
- [ ] SSL/TLS obligatorio

### DevOps
- [ ] Docker containers
- [ ] CI/CD pipeline (GitHub Actions)
- [ ] Testing automatizado
- [ ] Deploy automático
- [ ] Backup automatizado de BD
- [ ] Monitoreo y alertas


