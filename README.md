# Drupal 8 Docker Compose Development

- [Overview](#overview)
- [Requirements](#requirements)
- [Directory Structure](#directory-structure)
- [Installation](#installation)
  - [Starting Containers](#starting-containers)
  - [Stopping Containers](#stopping-containers)
  - [Destroying Containers](#destroying-containers)
  - [Installing PHP extensions](<#Installing-php-extensions-(optional)>)
- [Troubleshooting](#troubleshooting)

## Overview

This stack is to easily setup [Drupal 8](https://www.drupal.org/8) local development. This setup is using the following docker images:

- [Drupal](https://hub.docker.com/_/drupal)
- [MySQL](https://hub.docker.com/_/mysql)
- [NGINX](https://hub.docker.com/_/nginx)

To improve the performance specially on Mac users that are experiencing slowness on mounted volumes, this only mounts the necessary directories in drupal development which are the **sites**, **modules**, **themes** and **profiles** directories.

## Requirements

- [Docker engine 18+](https://docs.docker.com/install)
- [Docker compose 1.24+](https://docs.docker.com/compose/install)

## Directory Structure

- **/drupal-data/modules** - The directory into which all custom (created by you) and contributed (created by community) modules go.

  - Splitting this up into the sub-directories **contrib** and **custom** can make it easier to keep track of the modules. You can create subfolders for organization to match your development, storage, usage standards.

- **/drupal-data/profiles** - All contributed and custom installation profiles.

- **/drupal-data/sites** - Site specific configurations such us database connection settings, services settings, etc. can be found in inside this directory.

  - Site specific modules and themes for multi-site setup can be moved into this directory to avoid them showing up on every site.
  - It also contains the storage of site-specific files. This includes files uploaded by users (such as images) and site configuration (**active** and **staged**).

- **/drupal-data/themes** - All contributed and custom themes and subthemes. Please note that subthemes do require the base theme to be installed here as well.

- **/mariadb-data** - Contains MySQL data to persist your database.

- **/nginx/conf.d** - The drupal nginx vhost configuration.

## Installation

Clone the repository

```bash
git clone https://github.com/darrylmabini/docker-compose-drupal-8.git drupal8-project-name
```

CD into the project directory

```bash
cd drupal8-project-name
```

Create **.env** file

```bash
cp default.env .env
```

Edit **.env** file **_(optional)_**

```bash
vi .env
```

```bash
MYSQL_ROOT_PASSWORD=root_password
MYSQL_DATABASE=drupal8_playground
MYSQL_USER=drupal_database_user
MYSQL_PASSWORD=drupal_database_password
```

### Starting containers

```bash
docker-compose up -d
```

Once all the containers are running, you can now visit the Drupal site in your favorite browser ([http://localhost/](http://localhost/)).

### Stopping containers

```bash
docker-compose stop
```

### Destroying containers

```bash
docker-compose down
```

### Installing PHP Extensions _(Optional)_

Let's say you want to add the opcache php extension, you can simply do it by running this command

```bash
docker-compose exec drupal apk php7-opcache
```

**_Note:_** Destoying the containers will remove any additional installation or configuration done in the containers

## Troubleshooting

Display and follow log output from services

```bash
docker-compose logs -f drupal
```

```bash
docker-compose logs -f mysql
```

```bash
docker-compose logs -f nginx
```

## Manually Download Drupal 8

```console
curl -fSL "https://ftp.drupal.org/files/projects/drupal-${DRUPAL_VERSION}.tar.gz" -o drupal.tar.gz; \
	echo "${DRUPAL_MD5} *drupal.tar.gz" | md5sum -c -; \
	tar -xz --strip-components=1 -f drupal.tar.gz; \
	rm drupal.tar.gz;
```
