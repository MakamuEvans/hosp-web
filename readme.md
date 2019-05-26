# CollabMed DeMo

A demo project highlighting Laravel and Vue Skills for CollabMed

## Getting Started

For experimenting with this code, and running it locally:

### Prerequisites

PHP Composer with Laravel Installer.
Node and Npm
MYSQL database
Server Architecture like Apache2 or NGINX

### Installing

1. Clone this repo
2. in the project's root directory, run `composer install`
3. Ensure you have .env file then run `php artisan key:generate`.
4. Fill your database credentials and run `php artisan migrate` followed by `php artisan db:seed` in order to create the default test user
5. Run `npm install` to install all JS dependencies


## Deployment and Development
Ensure you always run `npm run dev && npm run watch` during development.
`npm run prod` should be run before deploying to production server

## Working Mechanism
......

## Built With

* [Laravel](http://www.laravel.com) - The web framework used
* [VueJS](https://maven.apache.org/) - JS Framework

