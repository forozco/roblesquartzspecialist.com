#!/bin/bash

# Script para crear/resetear el usuario administrador

echo "======================================================================"
echo "  Crear/Resetear Usuario Administrador"
echo "======================================================================"
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Error: Docker no está corriendo."
    echo "   Por favor inicia Docker Desktop y vuelve a ejecutar este script."
    exit 1
fi

echo "🔧 Reseteando contraseña del usuario administrador..."
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="\$user = App\Models\User::where('email', 'info@roblesquartzspecialist.com')->first(); if (\$user) { \$user->password = bcrypt('12345678'); \$user->save(); echo 'Contraseña actualizada'; } else { App\Models\User::create(['name' => 'Admin', 'email' => 'info@roblesquartzspecialist.com', 'password' => bcrypt('12345678')]); echo 'Usuario creado'; }"

echo ""
echo "✅ ¡Listo!"
echo ""
echo "Ahora puedes iniciar sesión en: http://localhost:8080/login"
echo "Email:    info@roblesquartzspecialist.com"
echo "Password: 12345678"
echo ""
