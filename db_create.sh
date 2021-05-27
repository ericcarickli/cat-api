#!/bin/bash

cp .env.example .env
docker exec -i db psql -d postgres -U postgres -c "create database cat_api;"
docker exec -i cat-api_laravel.test_1 php artisan key:generate
docker exec -i cat-api_laravel.test_1 php artisan migrate
docker exec -i cat-api_laravel.test_1 php artisan db:seed
docker exec -i cat-api_laravel.test_1 php artisan jwt:secret
