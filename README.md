# Robles Quartz Specialist

E-commerce platform for Robles Quartz Specialist, built with Laravel 8.75 and Bootstrap 5.

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

## Installation

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

5. **Install PDO MySQL extension** (first time only)
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 docker-php-ext-install pdo_mysql
   docker restart roblesquartzspecialistcom-laravel.test-1
   ```

6. **Run database migrations**
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate --force
   ```

7. **Install Node dependencies and compile assets**
   ```bash
   npm install
   npm run production
   ```

8. **Access the application**
   - Frontend: http://localhost:8080
   - MySQL: localhost:3306

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
