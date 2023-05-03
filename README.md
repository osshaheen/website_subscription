## after creating database follow this steps

1- copy .env.example to .env

2- run the command : 
    
    composer install

3 - run the command

    php artisan key:generate

4 - update .env with your smtp provider credentials

5 - update .env QUEUE_CONNECTION to 

    QUEUE_CONNECTION:database

6 - run the command

    php artisan queue:table

7 - run the command

    php artisan migrate

8 - run the command

    php artisan queue:work


Enjoy, and use postman collection to start.
