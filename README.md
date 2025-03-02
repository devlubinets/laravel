<p align="center">
    <h1 align="center">Laravel base project</h1>
    <br>
</p>

REQUIREMENTS
------------

The minimum requirements for this project:
- PHP 7.2
- MySQL 8.0.3


Installing using Docker
-----------------------

> You need to have [docker](http://www.docker.com) (1.17.0+) and
[docker-compose](https://docs.docker.com/compose/install/) (1.14.0+) installed.

You can install the application using the following commands:

```sh
git clone https://github.com/Yurii-Ivakhnov/laravel.git 
cd laravel
cp .env.example .env
cp docker-compose.override.yml{.dist,}
docker-compose up -d --build
```

> In `.env` file your need to set your UID.
> You can get your UID by the following command in the terminal: `id -u <username>`


It may take some minutes to download the required docker images. When
done, you need to install vendors as follows:

```sh
docker exec -it laravel-app-web-container bash
composer install
chown -R www-data:www-data .
```

When done, you need to execute the following commands in the web container:
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`

After this steps, you can access your app from [http://localhost:xxxxx](http://localhost:xxxxx).
