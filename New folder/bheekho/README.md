1 composer install --optimize-autoloader --no-dev

or if that won't work or through any error.

2 composer install --ignore-platform-reqs

3 grant permission to storage folder and subfolder inside that (/project/storage)

4 cp .env.example .env

5 Change the Databse configration on .env file

6 Or email configuration if needed

7 php artisan key:generate

8 php artisan c:cache