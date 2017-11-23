# WP4Docker

This starter kit aims to solve having to recreate your local development environment a billion times over on a
new WordPress Project. This will fast forward your setup time so that you can get straight to coding.
## Development Server

A Docker environment is included. The idea was to be able to just git clone the repo and get right to developing. It was also intended to be able to easily share the project amongst developers and save environment setup time.

Use `docker-compose up` to run, etc. and use `npm run savedb` to get a backup of the database. For security reason the database isn't committed. This will have to be shared manually.

## VSCode

This project is configured with settings for VSCode to use recommended plugins for PHP development, including linting for the WordPress Style Guide.

### WP-CLI

WP-CLI is available (while the container is running) via `npm run wp plugin install scripts-n-styles` (as long as a volume is mounted). The CLI will have access to the database, but will only have access to the files mounted. If you mount into `/var/www/html/` it can update the whole install, but if you mount into `/var/www/html/wp-content/themes/` it will only be able to modify that directory.

Because it's an `npm run` command, if you need to pass flags, run `npm run wp --` instead, for example `npm run wp -- core update --version=trunk`.

## File Structure

In the WebPack workflow you will find a src directory. This directory is where most of your development edits will happen. I've chosen to name the compiled directory that WebPack creates to `assets/` since the files/content that live there will mostly be of JavaScript, images and CSS type. Keep in mind that most WebPack projects name the compiled directory
`build/`. Since this is intended for WordPress it doesn't follow WebPack normal conventions.

## Plugins

I decided to pass my Less through PostCss as it will allow me to write future CSS code if I wanted to
opt out of Less specific coding style.

1. postcss-import -- I'm using this plugin to be able to import regular css as file aside less file too.

1. autoprefixer -- I'm using this plugin to automatically insert browsers prefixes so I don't have to think about it.

1. postcss-cssnext -- I'm using this plugin so that I'm able to use future CSS code now.

1. rimraf -- Using this to make sure I start with a new clean compilation of my assets files.

## Development Process - NPM Scripts Explained

To have webpack watch and compile your assets/ files, run

```
npm run build
```
Hit ctrl + 'c' to kill webpack watch command.

**At this time no live reloading is available.**

A manual browser refresh will need to be made.

## Deployment Process

 When you don't have shell access but you can sftp into the server.

 Use rsync to deploy your files/directories to you production server.

## TO DO's

1. Setup a server with live reload.
1. Setup a production build script
1. Setup up image compression.
1. Reformat code style
