# Sistema de Carrito (Saskia) - Instrucciones de Instalación

## ✅ Archivos Creados

### Capa de Lógica (Model)
- `com/leartik/daw24oiur/saskia/saskia.php` - Clase Saskia para gestionar el carrito en sesión
- `com/leartik/daw24oiur/saskia/saskia_db.php` - Capa de datos para persistencia en BD

### Controlador (Controller)
- `saskia/index.php` - Procesa acciones: gehitu, aldatu, ezabatu

### Vistas (View)
- `saskia/saskia_erakutsi.php` - Muestra el carrito con tabla editable
- `saskia/erosi.php` - Procesa la compra final
- `eskerrik_asko.php` - Página de confirmación

### Script SQL
- `SQL_SASKIA.sql` - Tablas necesarias para la BD

## 📋 Pasos de Instalación

### 1. Crear las Tablas en la Base de Datos
Ejecuta el archivo `SQL_SASKIA.sql` en SQLite:

```sql
-- Abre SQLite en la carpeta ERRONKA_01
sqlite3 produktuak.db < SQL_SASKIA.sql
```

O copia el contenido del archivo y ejecuta en tu cliente SQLite.

### 2. Verificar Rutas
- Los archivos usan rutas relativas a `/ERRONKA_01/`
- Asegúrate de que `produktuak.db` está en `c:\xampp\htdocs\ERRONKA_01\`

### 3. Probar el Sistema

**Flujo Completo:**
1. Accede a `/ERRONKA_01/index.php` o cualquier página de productos
2. Haz clic en "Saskira" (botón añadir al carrito)
3. Ve a `/ERRONKA_01/saskia/saskia_erakutsi.php` para ver el carrito
4. Modifica cantidades o elimina productos
5. Haz clic en "Erosketa Bukatu"
6. Se guardará en BD y serás redirigido a confirmación

## 🔧 Métodos de la Clase Saskia

```php
$saskia = new Saskia();

// Añadir producto
$saskia->gehitu($id, $kantitatea);

// Modificar cantidad
$saskia->aldatu($id, $kantitatea);

// Eliminar producto
$saskia->ezabatu($id);

// Obtener contenido
$edukia = $saskia->getEdukia(); // Array [id => kantitatea]

// Contar items
$zenbakia = $saskia->getZenbakia();

// Vaciar carrito
$saskia->garbitu();
```

## 📦 Estructura de Datos en Sesión

```php
$_SESSION['saskia'] = [
    1 => 2,    // Producto ID 1, cantidad 2
    5 => 1,    // Producto ID 5, cantidad 1
    12 => 3    // Producto ID 12, cantidad 3
];
```

## 🗄️ Tablas en Base de Datos

**eskariak** (Compras)
- id (PK)
- erabiltzaile_id (FK)
- data (timestamp)
- totala (float)
- egoera (pending, completada, cancelada)

**eskari_xehetasunak** (Detalles de compra)
- id (PK)
- eskaria_id (FK)
- produktu_id (FK)
- kantitatea (int)

## ⚠️ Notas Importantes

1. Actualmente el `erabiltzaile_id` en `erosi.php` es fijo (ID 1)
   - Ajusta esto según tu sistema de autenticación

2. Valida que el usuario existe en tabla `erabiltzaileak` antes de hacer compras

3. El carrito se vacía automáticamente tras completar la compra

4. Las compras se guardan con estado `pending` por defecto

## 🔐 Seguridad (Próximas Mejoras)

- Validar que los productos existen antes de añadir
- Validar disponibilidad de stock
- Implementar autenticación real
- Usar prepared statements para todas las queries (ya implementado en saskia_db.php)

---
Sistema de carrito implementado exitosamente ✅
