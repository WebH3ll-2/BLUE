# BLUE

## Installation

1. Download as .zip or clone this repo using
   `git clone thisrepo`
2. Import the `data/todo_db.sql` file to phpMyAdmin
3. Install composer
   https://getcomposer.org/download/
4. Run `composer install`
5. Start your Apache server and go to http://localhost/php-basic-mvc

## Project structure

As most MVC frameworks, this project flows through `public/index.php` and loads the correspondant page base on the URL

```
cau-michelin/
    config/             # Database credentials, utility functions, constants used frequently
    data/               # SQL database file
    public/             # Accessible files. What final users see
        css/            # Compiled css file
        js/             # Compiled javascript file
        index.php       # Starting point for the entire app
    src/                # Application source code
        app/            # Router class, routes.php
        controllers/    # Controller classes
        models/         # Model classes
        views/          # Views
        .htaccess       # Make src/ unaccessible for users
    vendor/             # Composer files, autoloader !ignored
    .gitignore          # Files/folders to be ignored by version control
    .htaccess           # Redirect everything to public/ folder
    composer.json       # Composer dependency file
```
