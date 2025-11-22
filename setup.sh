#!/bin/bash

# Script de instalación automática para Robles Quartz Specialist
# Este script configura todo el entorno de desarrollo automáticamente

set -e  # Detener si hay algún error

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Funciones de ayuda
print_header() {
    echo ""
    echo -e "${BLUE}========================================${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}========================================${NC}"
    echo ""
}

print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ $1${NC}"
}

# Banner
clear
echo -e "${BLUE}"
cat << "EOF"
╔═══════════════════════════════════════════════════╗
║                                                   ║
║     ROBLES QUARTZ SPECIALIST                      ║
║     Instalador Automático                         ║
║                                                   ║
╚═══════════════════════════════════════════════════╝
EOF
echo -e "${NC}"

# Verificar requisitos
print_header "1/7 - Verificando requisitos previos"

if ! command -v docker &> /dev/null; then
    print_error "Docker no está instalado"
    echo "Por favor instala Docker Desktop desde: https://www.docker.com/products/docker-desktop"
    exit 1
fi
print_success "Docker encontrado"

if ! docker info &> /dev/null; then
    print_error "Docker no está corriendo"
    echo "Por favor inicia Docker Desktop"
    exit 1
fi
print_success "Docker está corriendo"

# Verificar si ya existen contenedores corriendo
if docker ps | grep -q "roblesquartzspecialistcom"; then
    print_info "Detectados contenedores existentes. Deteniéndolos..."
    ./vendor/bin/sail down 2>/dev/null || true
fi

# Instalar dependencias de Composer
print_header "2/7 - Instalando dependencias de PHP (Composer)"
print_info "Esto puede tomar varios minutos la primera vez..."

if [ ! -d "vendor" ]; then
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
    print_success "Dependencias de Composer instaladas"
else
    print_success "Dependencias de Composer ya instaladas"
fi

# Configurar archivo .env
print_header "3/7 - Configurando variables de entorno"

if [ ! -f ".env" ]; then
    if [ -f ".env.example" ]; then
        cp .env.example .env
        print_success "Archivo .env creado desde .env.example"
    else
        print_error "No se encontró .env.example"
        exit 1
    fi
else
    print_success "Archivo .env ya existe"
fi

# Dar permisos de ejecución a Sail
chmod +x vendor/bin/sail 2>/dev/null || true
chmod +x vendor/laravel/sail/bin/sail 2>/dev/null || true

# Levantar contenedores Docker
print_header "4/7 - Iniciando contenedores Docker"
print_info "Descargando imágenes Docker (solo la primera vez)..."

./vendor/bin/sail up -d

print_success "Contenedores iniciados"
print_info "Esperando a que MySQL esté listo..."
sleep 10

# Verificar que los contenedores estén corriendo
if ! docker ps | grep -q "roblesquartzspecialistcom-laravel"; then
    print_error "El contenedor de Laravel no está corriendo"
    docker logs roblesquartzspecialistcom-laravel.test-1
    exit 1
fi

# Esperar a que MySQL esté healthy
echo -n "Esperando MySQL..."
for i in {1..30}; do
    if docker ps | grep mysql | grep -q "healthy"; then
        echo ""
        print_success "MySQL está listo"
        break
    fi
    echo -n "."
    sleep 1
done
echo ""

# Instalar extensión PDO MySQL
print_header "5/7 - Configurando extensión de base de datos"

if ! docker exec roblesquartzspecialistcom-laravel.test-1 php -m | grep -q "pdo_mysql"; then
    print_info "Instalando pdo_mysql..."
    docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql > /dev/null 2>&1
    docker restart roblesquartzspecialistcom-laravel.test-1 > /dev/null 2>&1
    print_success "Extensión pdo_mysql instalada"
    sleep 5
else
    print_success "Extensión pdo_mysql ya instalada"
fi

# Ejecutar migraciones
print_header "6/7 - Configurando base de datos"

docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate --force
print_success "Base de datos configurada"

# Instalar dependencias de Node (opcional)
print_header "7/7 - Instalando dependencias de Node.js"

if command -v npm &> /dev/null; then
    if [ ! -d "node_modules" ]; then
        print_info "Instalando paquetes de Node.js..."
        npm install
        print_success "Dependencias de Node instaladas"

        print_info "Compilando assets..."
        npm run production
        print_success "Assets compilados"
    else
        print_success "Dependencias de Node ya instaladas"
    fi
else
    print_info "Node.js no encontrado. Puedes instalar los assets más tarde con 'npm install && npm run production'"
fi

# Dar permisos a archivos necesarios
chmod +x node_modules/.bin/* 2>/dev/null || true

# Resumen final
print_header "¡Instalación Completada! 🎉"

echo ""
echo -e "${GREEN}Todo está listo para trabajar${NC}"
echo ""
echo "📋 Resumen:"
echo "  • Sitio web: ${BLUE}http://localhost:8080${NC}"
echo "  • Base de datos MySQL: ${BLUE}localhost:3306${NC}"
echo "  • Usuario DB: ${BLUE}sail${NC}"
echo "  • Contraseña DB: ${BLUE}password${NC}"
echo ""
echo "🚀 Comandos útiles:"
echo "  • Ver logs:     ${YELLOW}docker logs roblesquartzspecialistcom-laravel.test-1${NC}"
echo "  • Detener:      ${YELLOW}./vendor/bin/sail down${NC}"
echo "  • Iniciar:      ${YELLOW}./vendor/bin/sail up -d${NC}"
echo "  • Watch CSS/JS: ${YELLOW}npm run watch${NC}"
echo ""
echo "📖 Consulta el archivo MANUAL.md para más información"
echo ""

# Verificar que el sitio responda
print_info "Verificando que el sitio esté accesible..."
sleep 3
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8080 || echo "000")

if [ "$HTTP_CODE" == "200" ]; then
    print_success "Sitio web accesible en http://localhost:8080"
    echo ""
    echo -e "${GREEN}Abre tu navegador en: http://localhost:8080${NC}"
else
    print_error "El sitio no responde (HTTP $HTTP_CODE)"
    echo "Espera unos segundos más y verifica manualmente en http://localhost:8080"
fi

echo ""
print_success "¡Listo para trabajar!"
echo ""
