#!/bin/bash

# Script para reiniciar la aplicación e instalar extensiones PHP automáticamente
# Usa este script en lugar de './vendor/bin/sail up -d' después de 'sail down'

echo "======================================================================"
echo "  Reiniciando Robles Quartz Specialist"
echo "======================================================================"
echo ""

# Step 1: Start containers
echo "🐳 Iniciando contenedores Docker..."
./vendor/bin/sail up -d

echo "⏳ Esperando a que los contenedores estén listos..."
sleep 10

# Step 2: Install PHP extensions
echo "📚 Instalando extensiones PHP (PDO MySQL y GD)..."
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql > /dev/null 2>&1

# Install GD Library dependencies
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get update > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-configure gd --with-freetype --with-jpeg > /dev/null 2>&1
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install gd > /dev/null 2>&1

echo "✓ Extensiones PHP instaladas"

# Step 3: Restart container
echo "🔄 Reiniciando contenedor..."
docker restart roblesquartzspecialistcom-laravel.test-1 > /dev/null 2>&1
sleep 5

echo ""
echo "======================================================================"
echo "  ✅ ¡Aplicación reiniciada con éxito!"
echo "======================================================================"
echo ""
echo "🌐 Accede a la aplicación en:"
echo "   Frontend: http://localhost:8080"
echo "   Admin:    http://localhost:8080/login"
echo ""
