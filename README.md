# WP4Docker

## VSCode

This project is configured with settings for VSCode to use recommended plugins for PHP development, including linting for the WordPress Style Guide.

## Development Server

A Docker environment is included. The idea was to be able to just git clone the repo and get right to developing. It was also intended to be able to easily share the project amongst developers and save environment setup time.

Use `docker-compose up` to run, etc. and use `npm run savedb` to get a backup of the database. For security reason the database isn't committed. This will have to be shared manually.

### WP-CLI

WP-CLI is available (while the container is running) via `npm run wp plugin install scripts-n-styles` (as long as a volume is mounted). The CLI will have access to the database, but will only have access to the files mounted. If you mount into `/var/www/html/` it can update the whole install, but if you mount into `/var/www/html/wp-content/themes/` it will only be able to modify that directory.

Because it's an `npm run` command, if you need to pass flags, run `npm run wp --` instead, for example `npm run wp -- core update --version=trunk`.
