# 🚀 Instalación Fácil - Robles Quartz Specialist

## ¿Qué necesitas tener instalado?

1. **Docker Desktop** - Descárgalo de: https://www.docker.com/products/docker-desktop
   - Instálalo y asegúrate de que esté corriendo (debe aparecer el ícono de Docker en tu barra de tareas)

2. **Node.js** - Descárgalo de: https://nodejs.org/
   - Descarga la versión LTS (recomendada)

## 📥 Pasos para instalar

### 1. Descarga el proyecto

Abre la terminal y ejecuta:

```bash
git clone https://github.com/forozco/roblesquartzspecialist.com.git
cd roblesquartzspecialist.com
```

### 2. Ejecuta el instalador automático

```bash
chmod +x install.sh
./install.sh
```

**¡Eso es todo!** El script hará todo el trabajo por ti. Toma un café ☕ mientras se instala (puede tardar 5-10 minutos).

### 3. Abre la aplicación

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

## 📞 ¿Necesitas ayuda?

Si algo no funciona, contacta a Fernando o consulta el archivo [README.md](README.md) para instalación manual paso a paso.
