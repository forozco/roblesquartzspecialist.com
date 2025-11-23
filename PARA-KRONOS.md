# 👋 Hola Kronos!

Este documento es para ti. Aquí está todo lo que necesitas saber, explicado de forma super simple.

## 🎯 Resumen de 30 Segundos

1. Instala Docker Desktop
2. Descarga el proyecto
3. Ejecuta `./setup.sh`
4. Espera 15 minutos
5. ¡Listo! Abre http://localhost:8080

---

## 📖 Guía Completa (Paso a Paso)

### PASO 1: Instalar Docker Desktop (5 minutos)

**¿Qué es Docker?**
Piensa en Docker como una "mini computadora virtual" que corre el proyecto. Es como una caja que tiene todo lo necesario para que el sitio funcione.

**Cómo instalarlo:**

1. Ve a: https://www.docker.com/products/docker-desktop
2. Descarga "Docker Desktop for Mac"
3. Abre el archivo descargado (.dmg)
4. Arrastra Docker a la carpeta Aplicaciones
5. **IMPORTANTE:** Abre Docker Desktop
6. Espera a que aparezca el ícono de la ballena en la barra superior
7. Cuando la ballena deje de moverse, está listo ✅

**💡 Tip:** Docker siempre debe estar corriendo cuando trabajes en el proyecto.

---

### PASO 2: Descargar el Proyecto (2 minutos)

1. Abre **Terminal** (búscala en Spotlight con Cmd+Espacio)
2. Copia y pega esto (línea por línea):

```bash
git clone https://github.com/forozco/roblesquartzspecialist.com.git
```

3. Presiona Enter
4. Espera a que termine de descargar
5. Luego escribe:

```bash
cd roblesquartzspecialist.com
```

6. Presiona Enter

**¿Dónde está el proyecto?**
En tu computadora, en la carpeta de tu usuario: `roblesquartzspecialist.com`

---

### PASO 3: Instalar Todo Automáticamente (15-20 minutos)

**Este es el paso más importante. Solo ejecuta un comando y el script hace todo solo.**

1. En la Terminal, escribe:

```bash
./setup.sh
```

2. Presiona Enter

**¿Qué va a pasar ahora?**

Verás mensajes como estos (es normal):

```
========================================
1/8 - Verificando requisitos previos
========================================
✓ Docker encontrado
✓ Docker está corriendo

========================================
2/8 - Instalando dependencias de PHP
========================================
(Muchas líneas de texto corriendo...)

========================================
4/8 - Descargando imágenes Docker
========================================
⏳ IMPORTANTE: Esta descarga puede tardar 10-20 minutos
   Tamaño total: ~2-3 GB

Descargando imagen PHP (1/2) - ~1.5 GB...
(Barras de progreso...)
```

**🚨 MUY IMPORTANTE:**
- **NO cierres la Terminal** mientras corre el script
- La descarga de Docker tarda 10-20 minutos (es normal!)
- Verás barras de progreso que se mueven
- Si no ves movimiento por más de 5 minutos, está bien, es lento
- ☕ Toma un café, ve a caminar, ten paciencia

**¿Cómo sé que terminó?**

Al final verás esto:

```
========================================
¡Instalación Completada! 🎉
========================================

✓ Sitio web: http://localhost:8080
✓ Todo está listo para trabajar

Abre tu navegador en: http://localhost:8080
```

---

### PASO 4: Verificar que Funciona (1 minuto)

1. Abre tu navegador (Chrome, Safari, etc.)
2. Ve a: **http://localhost:8080**
3. Deberías ver la página de Robles Quartz Specialist

**Si ves la página = ¡Éxito! 🎉**

---

## 💼 Uso Diario

### Para EMPEZAR a trabajar cada día:

```bash
cd roblesquartzspecialist.com
./vendor/bin/sail up -d
```

Luego abre: http://localhost:8080

### Para TERMINAR el día:

```bash
./vendor/bin/sail down
```

---

## 🎨 Modificar el Diseño

### Archivos que puedes editar:

**HTML (vistas):**
- `resources/views/welcome.blade.php` - Página de inicio
- `resources/views/productos.blade.php` - Productos
- `resources/views/contacto.blade.php` - Contacto

**CSS (estilos):**
- `resources/css/styles.css` - Estilos principales
- `resources/css/fuentes.css` - Fuentes

**Imágenes:**
- `public/img/` - Arrastra y suelta aquí

### Después de cambiar CSS:

```bash
npm run production
```

Luego recarga la página con Cmd+Shift+R

### Modo "watch" (auto-recompila CSS):

```bash
npm run watch
```

Deja esta ventana abierta mientras trabajas. Los cambios se aplicarán automáticamente.

---

## 🆘 Ayuda - Problemas Comunes

### "La instalación se quedó atorada"

**Es normal si:**
- Ves barras de progreso moviéndose lento
- Dice "Downloading..." o "Pulling..."
- Han pasado menos de 30 minutos

**Solo espera. NO cierres la Terminal.**

**Si después de 30 minutos no pasa nada:**
1. Presiona Ctrl+C
2. Ejecuta de nuevo: `./setup.sh`

---

### "Cannot connect to Docker daemon"

**Solución:**
1. Abre Docker Desktop (el ícono de la ballena)
2. Espera a que diga "Docker Desktop is running"
3. Vuelve a ejecutar: `./setup.sh`

---

### "Error al descargar imágenes"

**Solución rápida:**
1. Verifica tu conexión a internet
2. Cierra Docker Desktop completamente
3. Vuelve a abrir Docker Desktop
4. Ejecuta de nuevo: `./setup.sh`

**Si sigue sin funcionar:**
Tu firewall o antivirus puede estar bloqueando Docker. Pregúntale a IT o a tu amigo programador.

---

### "El sitio no carga en localhost:8080"

**Verifica que Docker esté corriendo:**
```bash
docker ps
```

Deberías ver algo así:
```
NAMES
roblesquartzspecialistcom-laravel.test-1
roblesquartzspecialistcom-mysql-1
```

**Si no ves nada:**
```bash
./vendor/bin/sail up -d
```

---

### "Los cambios de CSS no se ven"

1. Ejecuta: `npm run production`
2. Recarga la página con Cmd+Shift+R (borra caché)

---

### "Nada funciona, ayuda!"

**Opción nuclear (borra todo y empieza de nuevo):**

```bash
./vendor/bin/sail down -v
./setup.sh
```

Esto tardará otros 15-20 minutos pero debería arreglar todo.

---

## 📞 Contacto

Si tienes problemas:

1. Lee la sección de "Ayuda" arriba
2. Revisa el archivo **MANUAL.md** (más detallado)
3. Contacta al equipo de desarrollo

---

## 🎓 Comandos de Referencia Rápida

**Copiar y pegar según necesites:**

```bash
# Iniciar el proyecto
./vendor/bin/sail up -d

# Detener el proyecto
./vendor/bin/sail down

# Ver si está corriendo
docker ps

# Compilar CSS/JS
npm run production

# Auto-compilar CSS/JS (watch mode)
npm run watch

# Reinstalar desde cero
./vendor/bin/sail down -v
./setup.sh

# Ver logs si algo falla
docker logs roblesquartzspecialistcom-laravel.test-1
```

---

## ✅ Checklist

Verifica que hayas hecho todo:

- [ ] Docker Desktop instalado y corriendo
- [ ] Proyecto descargado (`git clone`)
- [ ] Script de instalación ejecutado (`./setup.sh`)
- [ ] Esperé pacientemente los 15-20 minutos de descarga
- [ ] El sitio carga en http://localhost:8080
- [ ] Sé cómo iniciar el proyecto (`./vendor/bin/sail up -d`)
- [ ] Sé cómo detenerlo (`./vendor/bin/sail down`)

**Si todo está marcado = ¡Listo para trabajar! 🚀**

---

**Última actualización:** Noviembre 2024
**Nivel requerido:** Ninguno (explicado para cualquiera)
**Tiempo de instalación:** 15-20 minutos
**Soporte:** Pregunta a tu equipo de desarrollo
