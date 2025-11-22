# 🚀 Inicio Rápido - Para Diseñadores

## Antes de empezar (solo una vez)

1. **Instala Docker Desktop**
   - Descarga: https://www.docker.com/products/docker-desktop
   - Abre Docker Desktop (debe aparecer un ícono en la barra superior)

2. **Descarga el proyecto**
   ```bash
   git clone https://github.com/forozco/roblesquartzspecialist.com.git
   cd roblesquartzspecialist.com
   ```

3. **Ejecuta el instalador automático**
   ```bash
   ./setup.sh
   ```

   ¡Listo! El script hace todo solo. Toma café ☕️, tardará unos 5-10 minutos.

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

### ¿El sitio no carga?
```bash
# Verifica que Docker esté corriendo
docker ps

# Si no hay contenedores, inícialos
./vendor/bin/sail up -d
```

### ¿Los cambios de CSS no se ven?
```bash
npm run production
# Luego recarga la página con Cmd+Shift+R
```

### ¿Algo no funciona?
```bash
# Reinicia todo
./vendor/bin/sail down
./vendor/bin/sail up -d
```

### ¿Nada de lo anterior funciona?
```bash
# Reinstala desde cero
./vendor/bin/sail down -v
./setup.sh
```

---

## 📞 ¿Necesitas más ayuda?

Lee el archivo completo: **MANUAL.md**

O contacta al equipo de desarrollo.

---

**¡Eso es todo! Así de simple. 🎉**
