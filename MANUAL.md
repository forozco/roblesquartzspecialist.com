# Manual de Instalación - Robles Quartz Specialist

## 📋 Requisitos Previos

Antes de empezar, necesitas instalar:

1. **Docker Desktop**
   - Mac: Descarga desde https://www.docker.com/products/docker-desktop
   - Instala y asegúrate de que Docker esté corriendo (verás el ícono de Docker en la barra superior)

2. **Node.js** (opcional, solo si vas a modificar estilos/scripts)
   - Mac: Descarga desde https://nodejs.org/
   - Elige la versión LTS (recomendada)

## 🚀 Instalación Automática (Recomendado)

La forma más fácil es usar el script de instalación automático:

1. **Descarga el proyecto**
   ```bash
   git clone https://github.com/forozco/roblesquartzspecialist.com.git
   cd roblesquartzspecialist.com
   ```

2. **Ejecuta el script de instalación**
   ```bash
   chmod +x setup.sh
   ./setup.sh
   ```

3. **¡Listo!** Abre tu navegador en: http://localhost:8080

El script hará todo automáticamente:
- ✅ Instalar dependencias de PHP
- ✅ Configurar el archivo .env
- ✅ Levantar los contenedores Docker
- ✅ Instalar la base de datos
- ✅ Compilar los archivos CSS/JS

## 📝 Instalación Manual (Paso a Paso)

Si prefieres hacerlo manualmente o el script automático no funciona:

### Paso 1: Descargar el Proyecto
```bash
git clone https://github.com/forozco/roblesquartzspecialist.com.git
cd roblesquartzspecialist.com
```

### Paso 2: Instalar Dependencias de PHP
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Esto tomará unos minutos la primera vez.

### Paso 3: Configurar Variables de Entorno
```bash
cp .env.example .env
```

El archivo `.env` ya está configurado con valores predeterminados para desarrollo local.

### Paso 4: Levantar Docker
```bash
./vendor/bin/sail up -d
```

Espera unos 30 segundos para que los contenedores estén listos.

### Paso 5: Instalar Extensión de MySQL
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql
docker restart roblesquartzspecialistcom-laravel.test-1
```

### Paso 6: Crear Base de Datos
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate --force
```

### Paso 7: Compilar Assets (Opcional)
Si vas a modificar CSS/JS:
```bash
npm install
npm run production
```

### Paso 8: Verificar
Abre tu navegador en: **http://localhost:8080**

Deberías ver la página de inicio de Robles Quartz Specialist.

## 🎨 Para Diseñadores

### Iniciar el Proyecto
Cada vez que quieras trabajar en el proyecto:
```bash
cd roblesquartzspecialist.com
./vendor/bin/sail up -d
```

Luego abre: http://localhost:8080

### Detener el Proyecto
Cuando termines de trabajar:
```bash
./vendor/bin/sail down
```

### Modificar Estilos CSS
Los archivos CSS están en: `resources/css/`

Después de hacer cambios, compila:
```bash
npm run watch
```

Este comando quedará corriendo y recompilará automáticamente cuando guardes cambios.

### Modificar Vistas (HTML)
Las plantillas están en: `resources/views/`

Los cambios se reflejan automáticamente al recargar la página.

### Modificar Imágenes
Las imágenes públicas están en: `public/img/`

Solo coloca o reemplaza imágenes ahí y ya estarán disponibles.

## 📂 Estructura de Archivos (para Diseñadores)

```
roblesquartzspecialist.com/
│
├── resources/
│   ├── views/              ← Plantillas HTML (Blade)
│   │   ├── welcome.blade.php      # Página de inicio
│   │   ├── productos.blade.php    # Página de productos
│   │   ├── contacto.blade.php     # Página de contacto
│   │   └── plantilla.blade.php    # Plantilla principal
│   │
│   ├── css/                ← Estilos CSS
│   │   ├── styles.css
│   │   └── fuentes.css
│   │
│   └── js/                 ← JavaScript
│       └── app.js
│
├── public/                 ← Archivos públicos
│   ├── img/                ← Imágenes
│   ├── fonts/              ← Fuentes
│   ├── css/                ← CSS compilado (no editar)
│   └── js/                 ← JS compilado (no editar)
│
└── routes/
    └── web.php             ← Rutas de la aplicación
```

## 🔧 Comandos Útiles

### Ver si Docker está corriendo
```bash
docker ps
```

Deberías ver dos contenedores:
- `roblesquartzspecialistcom-laravel.test-1`
- `roblesquartzspecialist com-mysql-1`

### Ver logs si algo no funciona
```bash
docker logs roblesquartzspecialistcom-laravel.test-1
```

### Reiniciar todo
```bash
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### Limpiar y empezar de nuevo
```bash
./vendor/bin/sail down -v
./setup.sh
```

## ❓ Problemas Comunes

### "No puedo acceder a http://localhost:8080"
**Solución:**
```bash
# Verifica que Docker esté corriendo
docker ps

# Si no hay contenedores, inícia los:
./vendor/bin/sail up -d

# Espera 30 segundos y vuelve a intentar
```

### "Permission denied" al ejecutar comandos
**Solución:**
```bash
chmod +x setup.sh
chmod +x vendor/bin/sail
```

### "El puerto 8080 está en uso"
**Solución:**
```bash
# Encuentra qué está usando el puerto
lsof -i :8080

# Detén ese proceso o cambia el puerto en .env:
# APP_PORT=8090
```

### Los cambios de CSS no se reflejan
**Solución:**
```bash
# Recompila los assets
npm run production

# Limpia caché del navegador (Cmd + Shift + R en Chrome/Safari)
```

### Docker dice "No such file or directory"
**Solución:**
```bash
# Asegúrate de estar en el directorio correcto
cd roblesquartzspecialist.com
pwd  # Debería mostrar la ruta al proyecto
```

## 📞 Ayuda

Si tienes problemas:

1. Verifica que Docker Desktop esté corriendo
2. Revisa los logs: `docker logs roblesquartzspecialistcom-laravel.test-1`
3. Intenta reiniciar: `./vendor/bin/sail down && ./vendor/bin/sail up -d`
4. Si nada funciona, ejecuta de nuevo: `./setup.sh`

## 🎯 Flujo de Trabajo Diario

1. **Al empezar el día:**
   ```bash
   cd roblesquartzspecialist.com
   ./vendor/bin/sail up -d
   npm run watch  # Si vas a modificar CSS/JS
   ```

2. **Trabajar normalmente:**
   - Edita archivos en `resources/views/` o `resources/css/`
   - Los cambios se verán automáticamente en http://localhost:8080

3. **Al terminar el día:**
   ```bash
   ./vendor/bin/sail down
   ```

## ✅ Checklist de Verificación

Después de instalar, verifica que todo funcione:

- [ ] Docker Desktop está corriendo
- [ ] `docker ps` muestra 2 contenedores corriendo
- [ ] http://localhost:8080 carga la página de inicio
- [ ] Las imágenes se cargan correctamente
- [ ] Los estilos CSS se aplican

Si todos los puntos están marcados, ¡estás listo para trabajar! 🎉
