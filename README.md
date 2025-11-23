# Robles Quartz Specialist

E-commerce platform for Robles Quartz Specialist, built with Laravel 8.75 and Bootstrap 5.

## 📚 Documentación

**Instalación Rápida:**
- **[INSTALACION-FACIL.md](INSTALACION-FACIL.md)** - 👈 **EMPIEZA AQUÍ** para instalación automática
- **[install.sh](install.sh)** - Script de instalación automática

**Para Diseñadores (no técnicos):**
- **[PARA-KRONOS.md](PARA-KRONOS.md)** - Guía personalizada para Kronos
- **[INICIO-RAPIDO.md](INICIO-RAPIDO.md)** - Guía rápida de referencia

**Para Desarrolladores:**
- **[MANUAL.md](MANUAL.md)** - Manual completo de instalación
- **[DEVELOPMENT.md](DEVELOPMENT.md)** - Guía de desarrollo y flujo de trabajo

## Features

- Laravel 8.75 framework
- Bootstrap 5 responsive design
- MercadoPago payment integration
- Multi-language support (EN/ES)
- Product catalog management
- Contact form with email notifications
- Docker-based development environment

## Tech Stack

- **Backend**: Laravel 8.75 (PHP 8.1)
- **Frontend**: Bootstrap 5, Laravel Mix
- **Database**: MySQL 8.0
- **Payments**: MercadoPago SDK
- **Email**: SMTP (Titan)
- **Development**: Docker with Laravel Sail

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [Node.js](https://nodejs.org/) (v14 or higher)
- Git

## Quick Installation (Recommended)

**For users who want automatic installation:**

1. **Clone the repository**
   ```bash
   git clone https://github.com/forozco/roblesquartzspecialist.com.git
   cd roblesquartzspecialist.com
   ```

2. **Run the installation script**
   ```bash
   chmod +x install.sh
   ./install.sh
   ```

That's it! The script will automatically:
- Install all dependencies
- Configure the environment
- Start Docker containers
- Install PHP extensions (PDO MySQL and GD Library)
- Run database migrations
- Create storage directories
- Create admin user
- Compile assets

After the script finishes, access the application at http://localhost:8080

## Manual Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/forozco/roblesquartzspecialist.com.git
   cd roblesquartzspecialist.com
   ```

2. **Install Composer dependencies using Docker**
   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd):/var/www/html" \
       -w /var/www/html \
       laravelsail/php81-composer:latest \
       composer install --ignore-platform-reqs
   ```

3. **Create environment file**
   ```bash
   cp .env.example .env
   ```

   Update the following variables in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=buscatuc_roblesstore
   DB_USERNAME=sail
   DB_PASSWORD=password

   WWWGROUP=1000
   WWWUSER=1000
   APP_PORT=8080
   ```

4. **Start Docker containers**
   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Install PHP extensions** (first time only)
   ```bash
   # Install PDO MySQL
   docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql

   # Install GD Library (required for image processing)
   docker exec roblesquartzspecialistcom-laravel.test-1 apt-get update
   docker exec roblesquartzspecialistcom-laravel.test-1 apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
   docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-configure gd --with-freetype --with-jpeg
   docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install gd

   # Restart container
   docker restart roblesquartzspecialistcom-laravel.test-1
   ```

6. **Run database migrations**
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate --force
   ```

7. **Create storage directories**
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 mkdir -p public/storage/material
   docker exec roblesquartzspecialistcom-laravel.test-1 mkdir -p public/storage/aplicacion
   docker exec roblesquartzspecialistcom-laravel.test-1 chmod -R 777 public/storage
   ```

8. **Create admin user**
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="App\Models\User::create(['name' => 'Admin', 'email' => 'info@roblesquartzspecialist.com', 'password' => bcrypt('12345678')]);"
   ```

9. **Install Node dependencies and compile assets**
   ```bash
   npm install
   npm run production
   ```

10. **Access the application**
   - Frontend: http://localhost:8080
   - Admin panel: http://localhost:8080/login
   - MySQL: localhost:3306

## Default Admin Credentials

After completing the installation, you can log in to the admin panel at http://localhost:8080/login with:

- **Email**: info@roblesquartzspecialist.com
- **Password**: 12345678

**Important**: Change this password in production!

## Development

### Start development environment
```bash
./vendor/bin/sail up -d
```

### Stop development environment
```bash
./vendor/bin/sail down
```

### Watch for asset changes
```bash
npm run watch
```

### Run artisan commands
```bash
./vendor/bin/sail artisan <command>
```

### Access Laravel container
```bash
docker exec -it roblesquartzspecialistcom-laravel.test-1 bash
```

## Database

The application uses MySQL 8.0 with the following credentials:

- **Database**: buscatuc_roblesstore
- **User**: sail
- **Password**: password
- **Root Password**: password

## Environment Variables

Key environment variables in `.env`:

```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:PNkyZUkAlQF1WfaV0lcV3MY6M8oe40Gx4wYqJAYNp8U=
APP_DEBUG=true
APP_URL=https://roblesquartzspecialist.com/

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=buscatuc_roblesstore
DB_USERNAME=sail
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=smtp.titan.email
MAIL_PORT=465
MAIL_USERNAME=info@roblesquartzspecialist.com
MAIL_ENCRYPTION=SSL

MP_PUBLIC_KEY=your_mercadopago_public_key
MP_ACCESS_TOKEN=your_mercadopago_access_token
```

## Production Deployment

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `npm run production`
5. Configure web server (nginx/Apache) to point to `public/` directory

## Troubleshooting

### Cannot log in / "These credentials do not match our records"
This happens when the admin user hasn't been created yet. Run:
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="App\Models\User::create(['name' => 'Admin', 'email' => 'info@roblesquartzspecialist.com', 'password' => bcrypt('12345678')]);"
```

If you get "Duplicate entry" error, the user already exists. Try resetting the password:
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan tinker --execute="\$user = App\Models\User::where('email', 'info@roblesquartzspecialist.com')->first(); \$user->password = bcrypt('12345678'); \$user->save();"
```

### GD Library extension error when uploading images
If you see "GD Library extension not available", install the GD extension:
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get update
docker exec roblesquartzspecialistcom-laravel.test-1 apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-configure gd --with-freetype --with-jpeg
docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install gd
docker restart roblesquartzspecialistcom-laravel.test-1
```

### Containers won't start
```bash
# View logs
docker logs roblesquartzspecialistcom-laravel.test-1
docker logs roblesquartzspecialistcom-mysql-1

# Restart everything
./vendor/bin/sail down -v
./vendor/bin/sail up -d
```

### Permission issues
```bash
chmod +x vendor/bin/sail
chmod +x vendor/laravel/sail/bin/sail
chmod +x node_modules/.bin/*
```

### Database connection errors
- Ensure MySQL container is healthy: `docker ps`
- Wait 30 seconds after starting containers for MySQL to initialize
- Check `.env` database credentials match docker-compose.yml

## License

This project is proprietary software. All rights reserved.

## Contact

For support or inquiries, contact: info@roblesquartzspecialist.com
