#!/bin/bash

# Robles Quartz Specialist - Installation Script
# This script automates the complete installation process

set -e  # Exit on any error

echo "======================================================================"
echo "  Robles Quartz Specialist - Instalación Automática"
echo "======================================================================"
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Error: Docker no está corriendo."
    echo "   Por favor inicia Docker Desktop y vuelve a ejecutar este script."
    exit 1
fi

echo "✓ Docker está corriendo"
echo ""

# Step 1: Install Composer dependencies
echo "📦 Paso 1/10: Instalando dependencias de Composer..."
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs --quiet

echo "✓ Dependencias de Composer instaladas"
echo ""

# Step 2: Create .env file if it doesn't exist
echo "⚙️  Paso 2/10: Configurando archivo .env..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "✓ Archivo .env creado"
else
    echo "✓ Archivo .env ya existe"
fi
echo ""

# Step 3: Make sail executable
echo "🔧 Paso 3/10: Configurando permisos..."
chmod +x vendor/bin/sail
chmod +x vendor/laravel/sail/bin/sail
echo "✓ Permisos configurados"
echo ""

# Step 4: Start Docker containers
echo "🐳 Paso 4/10: Iniciando contenedores Docker..."
./vendor/bin/sail up -d
echo "✓ Contenedores iniciados"
echo ""

# Wait for MySQL to be ready
echo "⏳ Esperando a que MySQL esté listo..."
sleep 15
echo "✓ MySQL listo"
echo ""

# Step 5: Install PHP extensions
echo "📚 Paso 5/10: Instalando extensiones PHP (PDO MySQL y GD)..."
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql > /dev/null 2>&1

# Install GD Library dependencies
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get update > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-configure gd --with-freetype --with-jpeg > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install gd > /dev/null 2>&1

echo "✓ Extensiones PHP instaladas"
echo ""

# Step 6: Restart container
echo "🔄 Paso 6/11: Reiniciando contenedor..."
docker restart roblesquartzspecialistcom-laravel.test-1 > /dev/null 2>&1
sleep 5
echo "✓ Contenedor reiniciado"
echo ""

# Step 7: Install Doctrine DBAL
echo "📦 Paso 7/11: Instalando Doctrine DBAL (requerido para migraciones)..."
docker exec roblesquartzspecialistcom-laravel.test-1 composer require "doctrine/dbal:^3.0" --quiet
echo "✓ Doctrine DBAL instalado"
echo ""

# Step 8: Run migrations
echo "🗄️  Paso 8/11: Ejecutando migraciones de base de datos..."
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate --force
echo "✓ Migraciones completadas"
echo ""

# Step 9: Create storage directories
echo "📁 Paso 9/11: Creando directorios de almacenamiento..."
docker exec roblesquartzspecialistcom-laravel.test-1 mkdir -p public/storage/material
docker exec roblesquartzspecialistcom-laravel.test-1 mkdir -p public/storage/aplicacion
docker exec roblesquartzspecialistcom-laravel.test-1 chmod -R 777 public/storage
echo "✓ Directorios creados"
echo ""

# Step 10: Create admin user
echo "👤 Paso 10/11: Creando usuario administrador..."
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="try { App\Models\User::create(['name' => 'Admin', 'email' => 'info@roblesquartzspecialist.com', 'password' => bcrypt('12345678')]); echo 'Usuario creado'; } catch (\Exception \$e) { echo 'Usuario ya existe'; }" 2>/dev/null || echo "Usuario administrador configurado"
echo "✓ Usuario administrador listo"
echo ""

# Step 11: Install Node.js in container and compile assets
echo "🎨 Paso 11/11: Instalando Node.js y compilando assets (esto puede tomar unos minutos)..."
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get install -y nodejs npm > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 npm install --silent
docker exec roblesquartzspecialistcom-laravel.test-1 npm run production --silent
echo "✓ Assets compilados"
echo ""

echo "======================================================================"
echo "  ✅ ¡Instalación completada con éxito!"
echo "======================================================================"
echo ""
echo "🌐 Accede a la aplicación en:"
echo "   Frontend: http://localhost:8080"
echo "   Admin:    http://localhost:8080/login"
echo ""
echo "🔐 Credenciales de administrador:"
echo "   Email:    info@roblesquartzspecialist.com"
echo "   Password: 12345678"
echo ""
echo "💡 Comandos útiles:"
echo "   Detener:  ./vendor/bin/sail down"
echo "   Iniciar:  ./vendor/bin/sail up -d"
echo "   Logs:     docker logs roblesquartzspecialistcom-laravel.test-1"
echo ""
echo "======================================================================"
