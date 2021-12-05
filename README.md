<h1 align="center"><a href="https://api-platform.com"><img src="https://api-platform.com/logo-250x250.png" alt="API Platform"></a></h1>

API Platform is a next-generation web framework designed to easily create API-first projects without compromising extensibility
and flexibility:

* Design your own data model as plain old PHP classes or [**import an existing one**](https://api-platform.com/docs/schema-generator)
  from the [Schema.org](https://schema.org/) vocabulary.
* **Expose in minutes a hypermedia REST or a GraphQL API** with pagination, data validation, access control, relation embedding,
  filters and error handling...
* Benefit from Content Negotiation: [GraphQL](https://graphql.org), [JSON-LD](https://json-ld.org), [Hydra](https://hydra-cg.com),
  [HAL](https://github.com/mikekelly/hal_specification/blob/master/hal_specification.md), [JSONAPI](https://jsonapi.org/), [YAML](https://yaml.org/), [JSON](https://www.json.org/), [XML](https://www.w3.org/XML/) and [CSV](https://www.ietf.org/rfc/rfc4180.txt) are supported out of the box.
* Enjoy the **beautiful automatically generated API documentation** ([Swagger](https://swagger.io/)/[OpenAPI](https://www.openapis.org/)).
* Add [**a convenient Material Design administration interface**](https://api-platform.com/docs/admin) built with [React](https://reactjs.org/)
  without writing a line of code.
* **Scaffold fully functional Progressive-Web-Apps and mobile apps** built with [Next.js](https://api-platform.com/docs/client-generator/nextjs/) (React),
[Nuxt.js](https://api-platform.com/docs/client-generator/nuxtjs/) (Vue.js) or [React Native](https://api-platform.com/docs/client-generator/react-native/)
thanks to [the client generator](https://api-platform.com/docs/client-generator/) (a Vue.js generator is also available).
* Install a development environment and deploy your project in production using **[Docker](https://api-platform.com/docs/distribution)**
and [Kubernetes](https://api-platform.com/docs/deployment/kubernetes).
* Easily add **[OAuth](https://oauth.net/) authentication**.
* Create specs and tests with **[a developer friendly API testing tool](https://api-platform.com/docs/distribution/testing/)**.

[![GitHub Actions](https://github.com/api-platform/core/workflows/CI/badge.svg)](https://github.com/api-platform/core/actions?workflow=CI)
[![Codecov](https://codecov.io/gh/api-platform/core/branch/master/graph/badge.svg)](https://codecov.io/gh/api-platform/core/branch/master)
[![SymfonyInsight](https://insight.symfony.com/projects/92d78899-946c-4282-89a3-ac92344f9a93/mini.svg)](https://insight.symfony.com/projects/92d78899-946c-4282-89a3-ac92344f9a93)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/api-platform/core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/api-platform/core/?branch=master)

The official project documentation is available **[on the API Platform website](https://api-platform.com)**.

API Platform embraces open web standards (OpenAPI, RDF/JSON-LD/Hydra, GraphQL, JSON:API, HAL, OAuth...) and the
[Linked Data](https://www.w3.org/standards/semanticweb/data) movement. Your API will automatically expose structured data
in Schema.org / JSON-LD. It means that your API Platform application is usable **out of the box** with technologies of
the semantic web.

It also means that **your SEO will be improved** because **[Google leverages these formats](https://developers.google.com/search/docs/guides/intro-structured-data)**.

Last but not least, the server component of API Platform is built on top of the [Symfony](https://symfony.com) framework,
while client components leverage [React](https://reactjs.org/) (a [Vue.js](https://vuejs.org/) flavor is also available).
It means that you can:

* Use **thousands of Symfony bundles and React components** with API Platform.
* Integrate API Platform in **any existing Symfony or React application**.
* Reuse **all your Symfony and React skills**, benefit of the incredible amount of documentation available.
* Enjoy the popular [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html) (used by default, but fully optional:
  you can use the data provider you want, including but not limited to MongoDB and Elasticsearch)

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



[Read the official "Getting Started" guide](https://api-platform.com/docs/distribution).

## Credits

Created by [Kévin Dunglas](https://dunglas.fr). Commercial support available at [Les-Tilleuls.coop](https://les-tilleuls.coop).
