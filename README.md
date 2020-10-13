# API Skeletons

## Laminas API Tools Doctrine Skeleton

A skeleton application for a Doctrine based API.


## Installation

Copy the local.php.dist to local.php

```
cp config/autoload/local.php.dist config/autoload/local.php
```

Run docker-sync and docker-compose

```
docker-sync start
docker-compose up
```

Connect to the docker container

```
.docker/connect
```

Create the database and install fixtures

```
php public/index.php migrations:migrate
php public/index.php data-fixture:import default
```

For development create an admin user and default OAuth2 client

```
php public/index.php data-fixture:import development
```

