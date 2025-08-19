＃アプリケーション名
　フリマアプリ

＃環境構築
git@github.com:karina-1020/free-market-app.git
docker-compose up -d --build
docker-compose exec php bash
composer install
cp .env.example .env　環境変数を変更
php artisan key:generate
php artisan migrate
php artisan db:seed
