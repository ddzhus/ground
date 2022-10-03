## Ground

Testing ground for DevOps purposes

### Includes 
- Laravel 7.6
- Queues
- Cron commands
- Image resizing
- Unit tests
- Webpack 

### Installation

- Create env and version files `copy .env.example .env && touch version` 
- Run `docker-compose up -d`
- Inside php container `docker-compose exec php bash`
- `composer install`
- `artisan key:generate`
- `artisan migrate:fresh --seed`
- `artisan storage:link`
- Inside node container `docker-compose run node bash`
- `yarn`
- `yarn dev`
- Open in browser `http://localhost/`
