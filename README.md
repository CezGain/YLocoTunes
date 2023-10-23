# Installation ⬇️
To run the project, you'll need :

    php 8+
    docker fully installed (client on windows or wsl)
    composer 2.0+
    node v20+

Clone the projet and navigate inside with your terminal to execute the next commands

Then,

    docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer install --ignore-platform-reqs
And,

    docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer require laravel/sail --dev

Then,

    copy and paste the .env.example in the .env, you don't have to  change it
    run : npm install
    run : php artisan sail:install : and select mysql (1)
    run : ./vendor/bin/sail up
After the installation, you can rerun if it's down
migrate and seed the database with :
    
    ./vendor/bin/sail artisan migrate:fresh --seed

refresh routes and configurations with :

    ./vendor/bin/sail artisan optimize
    run npm run dev


# Utilisation 🪧

You can now go on http://localhost
You may register and login to have a fully experience (with the save feature )
