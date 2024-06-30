FROM node:22-alpine3.18 AS build

COPY package.json /app/package.json
WORKDIR /app
RUN npm install

COPY . /app



FROM php:fpm-alpine3.19

COPY --from=build /app /app

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev


RUN docker-php-ext-install pdo_pgsql


# Change ownership of /app directory
RUN chown -R  www-data:www-data /app

VOLUME ["/app"]