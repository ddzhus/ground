#!/bin/bash
echo "Copy .env and .env.db"
cp  .env.example.postgres .env
cp  .env.db.example  .env.db

echo "Start project"
docker-compose up -d

echo "install Composer"
docker-compose exec php composer install

echo "install node modules"
docker-compose exec node yarn && yarn run dev

echo "Run migrate end seed"
docker-compose exec php ./docker/deploy/after-deploy-dev.sh

echo "Done"