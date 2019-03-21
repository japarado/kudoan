# Kudoan

Project Kudoan is a small web app for publishing events and colllating user feedback about those events. Project Kudoan
is written in PHP atop the Laravel web framework (give the Laravel repo a star will you ( ͡~ ͜ʖ ͡°)).

## System Requirements
1. Composer
Composer is a dependency manager for PHP packages. Composer is required to install Laravel itself as well as its dependencies. 
Install composer from [here](https://getcomposer.org) or from your package manager if you're using a Unix-based operating 
system

2. Laravel
Install laravel via Composer. Do this by navigating through your terminal (or cmd) to the project route (kudoan/) and punching
the following command

`composer global require laravel/installer`

3. A web server that can run PHP (optional)
This can be Apache, Nginx, Lighthttpd, and a lot of others. If using a Unix-based system, it is recommended to install and configure
one of them as in order to run the web app. However, simply navigating to the project's root directory (kudoan) via the terminal
and running the command `php artisan serve` will run a development server that can be opened through the browser with the 
URL of [localhost:8000](http://localhost:8000)
