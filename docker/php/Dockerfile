FROM node:22-alpine3.18 AS build

COPY package.json /app/package.json
WORKDIR /app
RUN npm install

COPY . /app

FROM php:fpm-alpine3.19

COPY --from=build /app /app


VOLUME ["/app"]