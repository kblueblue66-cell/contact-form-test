# お問い合わせフォーム

## 環境構築

git clone laravel-docker-template.git

docker compose up -d --build

##laravel環境構築

1:docker-compose exec php bash

2:composer install

3:.env.exampleファイルから.envファイルを作成

4:php artisan key:generate

5:php artisan migrate

6:php artisan db:seed

## 使用技術

MySQL:8.0.26

Laravel:8.83.8

PHP:8.1.34

## URL

[開発環境](http://localhost)

[phpMyAdmin](http://localhost:8080)
