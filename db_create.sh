#!/bin/bash

docker exec -i db psql -d postgres -U postgres -c "create database cat_api;"
cp .env.example .env
bash vendor/bin/sail artisan key:generate
bash vendor/bin/sail artisan migrate
bash vendor/bin/sail artisan db:seed
bash vendor/bin/sail artisan jwt:secret
