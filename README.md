## Install

## Setup Domain name
```shell
cp .env.example .env
```
edit .env file and set SERVER_NAME
```dotenv
SERVER_NAME=consent.local
```
Also, you can config your db name and credentials.

### Build and Start containers
````shell
docker-compose build --pull --no-cache
docker-compose up -d
````

### Getting OS X to trust self-signed SSL certificates
Set your os always trust to below certificate
```shell
docker compose cp caddy:/data/caddy/certificates/local/consent.local/consent.local.crt /any/location/in/your/machine
```
See https://tosbourn.com/getting-os-x-to-trust-self-signed-ssl-certificates/

### Set local host for dev
sudo echo '127.0.0.1  example.local' >> /etc/hosts

### Auth with JWT
Generate key pair for your local
We can automate this step only for dev envs because in live env we should never update our keypair
```shell
# Composer require is already done, composer.json updated
# docker-compose exec php composer require jwt-auth

# This step needs to be done for your local setup
docker-compose exec php sh -c '
    set -e
    apk add openssl
    php bin/console lexik:jwt:generate-keypair
    setfacl -R -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
    setfacl -dR -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
'
```

### Testing and Fixtures
```shell
cp phpunit.xml.dist .phpunit.xml
```
```shell
# These steps are already done, Just documented for the next services
docker-compose exec php composer require --dev alice
docker-compose exec php composer require --dev symfony/test-pack symfony/http-client justinrainbow/json-schema
```

### DB and Migrations
Create db for first time
```shell
docker-compose exec php bin/console doctrine:database:create
```

#### Make and run Migrations
After changing the mappings of your entities you can generate migrations and run them against your db
```shell
docker-compose exec php bin/console make:migration
docker-compose exec php bin/console doctrine:migrations:migrate
```

Also you can update db schema without generating migrations
```shell
docker-compose exec php bin/console doctrine:schema:update
```

### Seeding Database
Seed your local db to have some data, Write your fixtures in api/fixtures directory
```shell
docker-compose exec php bin/console hautelook:fixtures:load
```

### Running Tests
```shell
docker-compose exec php bin/console doctrine:database:create --env=test
docker-compose exec php bin/console doctrine:migration:migrate --env=test
docker-compose exec php bin/phpunit
```


[Doctrine Annotations for PHP 8.0](https://www.doctrine-project.org/projects/doctrine-orm/en/current/reference/attributes-reference.html)
[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution).

## Credits

Created by [Kévin Dunglas](https://dunglas.fr). Commercial support available at [Les-Tilleuls.coop](https://les-tilleuls.coop).
