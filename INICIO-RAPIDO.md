# 🚀 Inicio Rápido

## Antes de empezar (solo una vez)

### 1. Instala Docker Desktop
   - Descarga: https://www.docker.com/products/docker-desktop
   - **IMPORTANTE:** Instala y **abre Docker Desktop**
   - Verifica que aparezca el ícono de Docker en la barra superior
   - ⚠️ **Debe estar corriendo ANTES de continuar**

### 2. Descarga el proyecto
   Abre la Terminal (busca "Terminal" en Spotlight) y escribe:
   ```bash
   git clone https://github.com/forozco/roblesquartzspecialist.com.git
   cd roblesquartzspecialist.com
   ```

### 3. Ejecuta el instalador automático
   ```bash
   ./setup.sh
   ```

   **¿Qué va a pasar?**
   - El instalador descargará algunas cosas de internet (unos 2-3 GB)
   - La primera vez tarda **10-15 minutos** dependiendo de tu internet
   - Verás barras de progreso y mensajes en verde ✓
   - Si algo falla, el script te dirá qué hacer

   ⏳ **Toma café ☕️ y ten paciencia**, especialmente en la primera instalación.

4. **Abre en el navegador**
   http://localhost:8080

---

## Uso Diario

### ▶️ Para empezar a trabajar
```bash
cd roblesquartzspecialist.com
./vendor/bin/sail up -d
```

Abre: http://localhost:8080

### 🎨 Si vas a modificar estilos
```bash
npm run watch
```
(Deja esta ventana abierta mientras trabajas)

### ⏸️ Para terminar el día
```bash
./vendor/bin/sail down
```

---

## ¿Dónde están los archivos?

### 📄 HTML (Vistas)
`resources/views/`
- `welcome.blade.php` - Página de inicio
- `productos.blade.php` - Productos
- `contacto.blade.php` - Contacto
- `plantilla.blade.php` - Template principal

### 🎨 CSS
`resources/css/`
- `styles.css` - Estilos principales
- `fuentes.css` - Fuentes

Después de modificar CSS, ejecuta:
```bash
npm run production
```

### 🖼️ Imágenes
`public/img/`

Solo arrastra y suelta imágenes aquí.

---

## Ayuda Rápida

### 🐌 "La instalación tarda mucho / se quedó atorado"
**Esto es NORMAL la primera vez.**
- La descarga de Docker es grande (2-3 GB)
- Puede tardar 10-20 minutos según tu internet
- **NO cierres la terminal**, solo espera
- Verás mensajes como "Downloading..." o "Pulling..."

Si después de 30 minutos sigue atorado:
```bash
# Presiona Ctrl+C para cancelar
# Luego ejecuta de nuevo:
./setup.sh
```

### 🔴 "Docker no está corriendo" o "Cannot connect to Docker"
1. Abre Docker Desktop (busca el ícono de la ballena)
2. Espera a que diga "Docker Desktop is running"
3. Vuelve a ejecutar: `./setup.sh`

### 🌐 "Error descargando imágenes" o "timeout"
Tu internet puede estar lento o bloqueando Docker:
```bash
# Opción 1: Espera unos minutos e intenta de nuevo
./setup.sh

# Opción 2: Reinicia Docker Desktop
# Cierra Docker Desktop completamente
# Vuelve a abrirlo
# Ejecuta: ./setup.sh
```

### ❌ ¿El sitio no carga en http://localhost:8080?
```bash
# Verifica que Docker esté corriendo
docker ps

# Debes ver 2 contenedores corriendo
# Si no hay contenedores, inícialos:
./vendor/bin/sail up -d
```

### 🎨 ¿Los cambios de CSS no se ven?
```bash
npm run production
# Luego recarga la página con Cmd+Shift+R
```

### 💥 ¿Algo no funciona?
```bash
# Reinicia todo
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### 🔄 ¿Nada de lo anterior funciona?
```bash
# Reinstala desde cero (borra todo y empieza de nuevo)
./vendor/bin/sail down -v
./setup.sh
```

---

## 📞 ¿Necesitas más ayuda?

Lee el archivo completo: **MANUAL.md**

O contacta al equipo de desarrollo.

---

**¡Eso es todo! Así de simple. 🎉**
