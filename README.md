# mogitate-laravel
## 環境構築
Dockerビルド

    1.git clone: https://github.com/imachanimachan/mogitate-laravel
    2.docker-compose up -d --build  

Laravel環境構築

    1.docker-compose exec php bash  
    2.composer install  
    3..env.exampleファイルから.envを作成し、環境変数を変更  
    4.php artisan key:generate  
    5.php artisan　migrate  
    6.php artisan db:seed
## 使用技術（開発環境）
-Laravel11  
-PHP 8.3.4  
-MySQL 8.0.26

## ER図
![](ER.png)
## URL
-開発環境：http://localhost/  
-phpMyAdmin：http://localhost:8080/
