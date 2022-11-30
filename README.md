# Laravel Json Manager
This project runs with Laravel version ^9.37.0

## Getting started

``` bash
#move to directorys
cd json-manager-test-task

# install dependencies
chown -R $USER:www-data storage
chown -R $USER:www-data bootstrap/cache
chown -R $USER:www-data docker/storage

chmod -R 775 storage
chmod -R 775 bootstrap/cache


# run docker
cd docker
docker-compose up -d --build

#open test-db container and creating database
docker exec -it test-db  bash
mysql -u root -p
Enter password:root0 
mysql> CREATE DATABASE laravel;
mysql> GRANT ALL PRIVILEGES ON * . * TO 'root'@'localhost';
mysql> exit
bash# exit

#open test-app container
docker exec -it test-app  bash

#installing composer
composer install

# create .env file and set db credentials
cp .env.example .env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root0

# generate the application key
php artisan key:generate

# run database migrations and seeders
php artisan migrate --seed

# build CSS and JS assets
npm install
npm run build

```

Then launch the server:
http://localhost:8000/
