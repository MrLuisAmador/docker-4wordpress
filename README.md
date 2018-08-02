# Docker and Webpack WordPress Local Development Environment

This project aims to solve having to recreate your WordPress local development environment a billion times when starting a
new WordPress project. This will fast forward your setup time so that you can get straight to coding.

## Continuous Development

The second goal of the project was to be able to hand off or share the Docker environment with a team. They should be able to start the Docker container and contribute to the project.

## Prerequisites

The following items should have already been installed on you system. If not, please do so now.

1. Node and NPM
1. Composer
1. Docker
1. VS Code



## Installation

1. Download load the project [here.](https://github.com/MrLuisAmador/docker-4wordpress/archive/develop.zip)

1. Run `npm install` 

1. Run `composer install` 

1. Run `docker-compose up` to boot up the environment.

## Project Instructions ( NPM Script )

1. For any new, first run project, you will need to initialize. The command to run is `npm run init` .
Once this is done, you shouldn't have to run this command ever again for the life cycle of your project.

## Database Backup
There's a command to back up the database. Docker is able to boot up and use that database to keep a persistent copy of where you left of when the database was saved. If you plan to have another developer help with the project, save the database, commit it and anyone helping should be able to pick up right where you left off.

Use `npm run savedb` to get a backup of the database.

## VSCode

This project is configured with settings for VSCode to use recommended plugins for PHP development, including linting for the WordPress Style Guide and etc...

## WP-CLI

WP-CLI is available.

Because it's an `npm run` command, if you need to pass flags, run `npm run wp --` instead, for example `npm run wp -- core update`.

## File Structure

In the WebPack workflow you will find a `src` directory. This directory is where most of your development edits will happen. I've chosen to name the compiled directory that WebPack creates to `assets/` since the files/content that live there will mostly be of JavaScript, images and CSS type. Keep in mind that most WebPack projects name the compiled directory
`build/`. Since this is intended for WordPress it doesn't follow WebPack normal conventions.

## Plugins

I decided to pass my Less through PostCss as it will allow me to write future CSS code if I wanted to
opt out of Less specific coding style.

1. postcss-import -- I'm using this plugin to be able to import regular css as file aside less file too.

1. autoprefixer -- I'm using this plugin to automatically insert browsers prefixes so I don't have to think about it.

1. postcss-cssnext -- I'm using this plugin so that I'm able to use future CSS code now.

1. rimraf -- Using this to make sure I start with a new clean compilation of my assets files.

## Development Process - NPM Scripts Explained

To have webpack watch and compile your `assets/` files, run

```
npm start
```
Hit ctrl + 'c' to kill webpack watch command.



## Deployment Process

 When you don't have shell access but you can sftp into the server.

 Use rsync to deploy your files/directories to you production server.

## TO DO's

1. Setup a production build script
1. Setup up image compression.
1. Reformat code style
