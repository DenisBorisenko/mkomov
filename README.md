git clone https://github.com/DenisBorisenko/mkomov.git  
cd mkomov  
yarn  
composer install  
cp .env.example .env  
*указать настройки бд и изменить QUEUE_CONNECTION=database*   
php artisan migrate --seed  
yarn serve 
php artisan serve   
php artisan queue:work --tries=3

