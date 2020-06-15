#
# node and build files step
#
FROM node:10-alpine AS build-files

ARG ENVIRONMENT

RUN mkdir -p /var/www/app/public
WORKDIR /var/www/app
COPY ./ /var/www/app
RUN if [ ! "${ENVIRONMENT}" = "dev" -a ! "${ENVIRONMENT}" = "development" ]; then \
    npm install && \
    npm run prod && \
    rm -rf ./node_modules \
;fi

#
# main
#
FROM nginx:alpine

RUN apk update \
  && apk upgrade \
  && apk --no-cache add \
  && mkdir -p /var/www/app/public \
  && chmod 755 -R /var/www/app

COPY docker/nginx/etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY --from=build-files /var/www/app/public /var/www/app/public
