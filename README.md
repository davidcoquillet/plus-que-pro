### setup

after cloning the project :

make sure docker is running

- start sail : ./vendor/bin/sail up -d
- install frontend compoments : 
- - ./vendor/bin/sail npm install
- - ./vendor/bin/sail npm run dev
- run migrations : ./vendor/bin/sail artisan migrate

## testing the app

Fill the database : ./vendor/bin/sail php artisan app:init-movies

To be able to see the pages, we need to create a user to be able to use the authentication
- go to : http://127.0.0.1/register

after creating the user, we can now login to the app :
- go to : http://127.0.0.1/login

After login, we will be redirected to the movie list page

sources used for this app : stackoverflow, laracast, laravel.com/docs, chatgpt, jetstream doc