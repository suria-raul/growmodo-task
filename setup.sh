#!/usr/bin/env bash

npm --version
npm install

php --version
composer install
php artisan key:generate
php artisan migrate --seed
