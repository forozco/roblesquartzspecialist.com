# Development Guide

## Quick Start

```bash
# Start the environment
./vendor/bin/sail up -d

# View logs
./vendor/bin/sail logs -f

# Stop the environment
./vendor/bin/sail down
```

## Project Structure

```
.
├── app/                    # Application code
│   ├── Http/Controllers/   # Controllers
│   ├── Models/            # Eloquent models
│   └── Mail/              # Mail classes
├── config/                # Configuration files
├── database/              # Migrations and seeders
├── public/                # Public assets (compiled)
├── resources/             # Views and raw assets
│   ├── views/             # Blade templates
│   ├── css/               # SCSS/CSS files
│   └── js/                # JavaScript files
├── routes/                # Route definitions
│   └── web.php            # Web routes
├── storage/               # Application storage
└── tests/                 # Test files
```

## Common Tasks

### Adding a New Feature

1. **Create a new branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Create controller**
   ```bash
   ./vendor/bin/sail artisan make:controller YourController
   ```

3. **Create model with migration**
   ```bash
   ./vendor/bin/sail artisan make:model YourModel -m
   ```

4. **Update database**
   ```bash
   docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate
   ```

5. **Create view**
   - Add Blade template in `resources/views/`

6. **Add route**
   - Update `routes/web.php`

### Working with Assets

**Development mode (with file watching):**
```bash
npm run watch
```

**Production build:**
```bash
npm run production
```

**Clean and rebuild:**
```bash
rm -rf public/css/* public/js/*
npm run production
```

### Database Operations

**Run migrations:**
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate
```

**Rollback last migration:**
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate:rollback
```

**Fresh migration (WARNING: destroys data):**
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan migrate:fresh
```

**Access MySQL directly:**
```bash
docker exec -it roblesquartzspecialistcom-mysql-1 mysql -u sail -ppassword buscatuc_roblesstore
```

### Clearing Cache

```bash
# Clear all caches
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan cache:clear
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan config:clear
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan route:clear
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan view:clear
```

### Code Quality

**Laravel Pint (Code formatting):**
```bash
./vendor/bin/sail composer pint
```

**Run tests:**
```bash
./vendor/bin/sail artisan test
```

## Git Workflow

1. **Pull latest changes**
   ```bash
   git checkout main
   git pull origin main
   ```

2. **Create feature branch**
   ```bash
   git checkout -b feature/feature-name
   ```

3. **Make changes and commit**
   ```bash
   git add .
   git commit -m "Description of changes"
   ```

4. **Push to remote**
   ```bash
   git push -u origin feature/feature-name
   ```

5. **Create pull request on GitHub**

## Environment Configuration

### Local Development (.env)
```env
APP_ENV=local
APP_DEBUG=true
```

### Production (.env)
```env
APP_ENV=production
APP_DEBUG=false
```

## Docker Commands Reference

**View running containers:**
```bash
docker ps
```

**View all containers (including stopped):**
```bash
docker ps -a
```

**View container logs:**
```bash
docker logs roblesquartzspecialistcom-laravel.test-1
docker logs roblesquartzspecialistcom-mysql-1
```

**Restart a specific container:**
```bash
docker restart roblesquartzspecialistcom-laravel.test-1
```

**Execute command in container:**
```bash
docker exec roblesquartzspecialistcom-laravel.test-1 <command>
```

**Access container shell:**
```bash
docker exec -it roblesquartzspecialistcom-laravel.test-1 bash
```

## Troubleshooting

### Port Already in Use
```bash
# Find process using port 8080
lsof -i :8080

# Kill the process
kill -9 <PID>
```

### Permission Denied Errors
```bash
# Fix permissions for Laravel
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:$USER .
```

### MySQL Connection Refused
```bash
# Check MySQL is healthy
docker ps | grep mysql

# Wait for MySQL to be fully ready
docker logs roblesquartzspecialistcom-mysql-1

# Restart MySQL
docker restart roblesquartzspecialistcom-mysql-1
```

### Composer Install Fails
```bash
# Use Docker to run composer
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

## Helpful Artisan Commands

```bash
# List all routes
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan route:list

# Access tinker (Laravel REPL)
docker exec -it roblesquartzspecialistcom-laravel.test-1 php artisan tinker

# Generate app key
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan key:generate

# List all registered commands
docker exec roblesquartzspecialistcom-laravel.test-1 php artisan list
```

## Performance Optimization

### Production Optimization
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

## Security Best Practices

1. Never commit `.env` file
2. Keep dependencies up to date: `composer update`
3. Use environment variables for sensitive data
4. Enable HTTPS in production
5. Set `APP_DEBUG=false` in production
6. Use strong database passwords
7. Regularly backup database

## Additional Resources

- [Laravel Documentation](https://laravel.com/docs/8.x)
- [Laravel Sail Documentation](https://laravel.com/docs/8.x/sail)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.1/)
- [MercadoPago Developer Docs](https://www.mercadopago.com.mx/developers/es)
