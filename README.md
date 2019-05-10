# Docker and Webpack WordPress Local Development Environment

This project aims to solve having to recreate your WordPress local development environment when starting a
new WordPress project. This will fast forward your setup time so that you can get straight to coding.

## Continuous Development

The second goal of the project was to be able to hand off or share the Docker environment with a team. They should be able to start the Docker container and contribute to the project.

## Prerequisites

The following items should have already been installed on you system. If not, please do so now.

1. [Node and NPM](https://nodejs.org/en/download/)
1. [Composer](https://getcomposer.org/download/)
1. [Docker](https://docs.docker.com)
1. [VSCode](https://code.visualstudio.com/download)



## Installation

1. Download load the project [here.](https://github.com/MrLuisAmador/docker-4wordpress/archive/develop.zip)

1. Run `npm install`

1. Run `composer install`

1. Run `docker-compose up -d` to boot up the environment.

## Project Features

1. This project comes with a collection of PHP_CodeSniffer rules (sniffs) to validate code developed for WordPress. It ensures code quality and adherence to coding conventions, especially the official WordPress Coding Standards.

1.

### Database Backup
There's a command to back up the database. Docker is able to boot up and use that database to keep a persistent copy of where you left of when the database was saved. If you plan to have another developer help with the project, save the database, commit it and anyone helping should be able to pick up right where you left off.

Use `npm run savedb` to get a backup of the database.

### VSCode

This project is configured with settings for VSCode to use recommended plugins for PHP development, including linting for the WordPress Style Guide and etc...

Please install the recommanded extension that comes with this project.

## WP-CLI

WP-CLI is available.

Because it's an `npm run` command, if you need to pass flags, run `npm run wp --`, for example `npm run wp -- core update`.

## File Structure ( Making sense of the repo file structure. )

1. `.vscode` = This directory hold specific setting for the VSCode editor.
    * extension.json = This file is used to suggest recommended VSCode editor extensions to install.

    * settings.json = This file is used to configure the VSCode editior setting at the project level.

1. `docker-4wordpress-theme` = This directory is used to pull in the child theme. This is your main working folder and most of your time should be spent working here. This is where you will build your site at.

1. `html` = This directory hold the WordPress core source code. There shouldn't be a need to edit these files unless you want to make tweak to certain core files.

1. `initdb` = This directory is used to hold a database backup. If you're starting from a clean project that hasn't been initiated, the project will install this database if there's an initdb.sql in the directory. You can create a backup running `npm run savedb` . *Note* This file is overwritten when a new backup is run.

1. `node_modules` = This directory holds your Nodejs dependencies and should just be ignore and never touched.

1. `vendor` = This directory holds your Composer dependencies and should just be ignore and never touched.

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
