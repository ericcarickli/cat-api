#!/bin/bash

cp .env.example .env
docker-compose -f composer.yml up
docker-compose up
