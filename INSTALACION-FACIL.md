# 🚀 Instalación Fácil - Robles Quartz Specialist

## ¿Qué necesitas tener instalado?

1. **Docker Desktop** - Descárgalo de: https://www.docker.com/products/docker-desktop
   - Instálalo y asegúrate de que esté corriendo (debe aparecer el ícono de Docker en tu barra de tareas)

2. **Node.js** - Descárgalo de: https://nodejs.org/
   - Descarga la versión LTS (recomendada)

3. **GitHub Desktop** (opcional) - Si prefieres usar interfaz gráfica: https://desktop.github.com/

## 📥 Pasos para instalar

### 1. Descarga el proyecto

**Opción A: Con GitHub Desktop (más fácil)**
1. Abre GitHub Desktop
2. Ve a `File` → `Clone repository`
3. Pega esta URL: `https://github.com/forozco/roblesquartzspecialist.com.git`
4. Elige dónde guardar el proyecto
5. Clic en `Clone`
6. Recuerda la ruta donde lo guardaste (por ejemplo: `C:\Users\TuNombre\Documents\GitHub\roblesquartzspecialist.com`)

**Opción B: Con terminal/línea de comandos**
```bash
git clone https://github.com/forozco/roblesquartzspecialist.com.git
cd roblesquartzspecialist.com
```

### 2. Abre la terminal en la carpeta del proyecto

**En Windows:**
1. Abre el explorador de archivos
2. Navega a la carpeta donde clonaste el proyecto
3. En la barra de dirección, escribe `cmd` y presiona Enter
4. Se abrirá la terminal en esa ubicación

**En Mac:**
1. Abre Finder
2. Ve a la carpeta del proyecto
3. Clic derecho en la carpeta → `Services` → `New Terminal at Folder`

### 3. Ejecuta el instalador automático

En la terminal que acabas de abrir, escribe:

**En Mac/Linux:**
```bash
chmod +x install.sh
./install.sh
```

**En Windows (Git Bash):**
```bash
bash install.sh
```

**¡Eso es todo!** El script hará todo el trabajo por ti. Toma un café ☕ mientras se instala (puede tardar 5-10 minutos).

### 4. Abre la aplicación

Cuando termine, abre tu navegador y ve a:
- **Página pública**: http://localhost:8080
- **Panel de administración**: http://localhost:8080/login

## 🔐 Credenciales para entrar

Para acceder al panel de administración:

- **Email**: info@roblesquartzspecialist.com
- **Password**: 12345678

## ❓ Problemas comunes

### "Docker no está corriendo"
- Abre Docker Desktop y espera a que esté completamente iniciado
- Vuelve a ejecutar: `./install.sh`

### "Permission denied"
- Ejecuta: `chmod +x install.sh`
- Luego: `./install.sh`

### No puedo iniciar sesión
- Ejecuta este comando:
  ```bash
  docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="App\Models\User::create(['name' => 'Admin', 'email' => 'info@roblesquartzspecialist.com', 'password' => bcrypt('12345678')]);"
  ```

## 🛠️ Comandos útiles

**Detener la aplicación:**
```bash
./vendor/bin/sail down
```

**Iniciar la aplicación (después de haberla detenido):**
```bash
./vendor/bin/sail up -d
```

**Ver los logs si algo falla:**
```bash
docker logs roblesquartzspecialistcom-laravel.test-1
```

## 📋 Resumen rápido (para compartir)

**Si ya tienes el proyecto descargado con GitHub Desktop:**

1. Asegúrate de que Docker Desktop esté corriendo
2. Abre la terminal en la carpeta del proyecto:
   - **Windows**: En el explorador, en la barra de dirección escribe `cmd` y Enter
   - **Mac**: Clic derecho → Services → New Terminal at Folder
3. Ejecuta: `./install.sh` (Mac/Linux) o `bash install.sh` (Windows)
4. Espera 5-10 minutos
5. Abre http://localhost:8080/login
6. Usuario: `info@roblesquartzspecialist.com` / Contraseña: `12345678`

## 📞 ¿Necesitas ayuda?

Si algo no funciona, contacta a Fernando o consulta el archivo [README.md](README.md) para instalación manual paso a paso.
