<p align="center">
    <h1 align="center">Laravel Shop</h1>
    <br>
</p>

REQUIREMENTS
------------

The minimum requirements for this project:

- PHP 7.4
- MySQL 5.7
- Redis 4.0.6
- Laravel 8

Installing using Docker
-----------------------

> You need to have [docker](http://www.docker.com) (1.17.0+) and
[docker-compose](https://docs.docker.com/compose/install/) (1.14.0+) installed.

You can install the application using the following commands:

```sh
git clone https://github.com/Yurii-Ivakhnov/laravel.git 
cd laravel
cp .env.example .env
cp .php_cs.dist .php_cs
cp docker-compose.override.yml{.dist,}
docker-compose up -d --build
```

> In `.env` file your need to set your HOST_UID=****.
> You can get your UID by the following command in the terminal: `id -u <username>`


It may take some minutes to download the required docker images. When
done, you need to install vendors as follows:

```sh
docker exec -it laravel-web-container bash
composer install
chown -R www-data:www-data .
```
Then install php-cs-fixer:
```sh
mkdir --parents tools/php-cs-fixer
composer require --dev --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer
cp .php_cs.dist .php_cs
```
For run cs-fixer use `tools/php-cs-fixer/vendor/bin/php-cs-fixer fix`

When done, you need to execute the following commands in the web container:
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`

After this steps, you can access your app from [http://localhost:xxxxx](http://localhost:xxxxx).

