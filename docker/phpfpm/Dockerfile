#
# setup
#
FROM php:7.3-fpm-alpine3.8

ARG ENVIRONMENT
ENV COMPOSER_ALLOW_SUPERUSER 1

ARG PHP_XDEBUG_INSTALL="false"
ARG PHP_XDEBUG_PHP_IDE_CONFIG=""
ARG PHP_XDEBUG_DEFAULT_ENABLE="Off"
ARG PHP_XDEBUG_REMOTE_ENABLE="On"
ARG PHP_XDEBUG_REMOTE_PORT="9001"
ARG PHP_XDEBUG_REMOTE_HOST="127.0.0.99"
ARG PHP_XDEBUG_REMOTE_AUTO_START="Off"
ARG PHP_XDEBUG_REMOTE_CONNECT_BACK="Off"
ARG PHP_XDEBUG_IDEKEY="PHPSTORM"
ARG PHP_XDEBUG_PROFILER_ENABLE="Off"
ARG PHP_XDEBUG_PROFILER_OUTPUT_DIR="/tmp"
ENV PHP_IDE_CONFIG ${PHP_XDEBUG_PHP_IDE_CONFIG}

ARG DOT_ENV_APP_NAME=${APP_NAME}
ARG DOT_ENV_APP_ENV=${ENVIRONMENT}
ARG DOT_ENV_APP_KEY
ARG DOT_ENV_APP_DEBUG="false"
ARG DOT_ENV_APP_URL
ARG DOT_ENV_LOG_CHANNEL
ARG DOT_ENV_DB_CONNECTION
ARG DOT_ENV_DB_HOST
ARG DOT_ENV_DB_PORT
ARG DOT_ENV_DB_DATABASE
ARG DOT_ENV_DB_USERNAME
ARG DOT_ENV_DB_PASSWORD
ARG DOT_ENV_BROADCAST_DRIVER
ARG DOT_ENV_CACHE_DRIVER
ARG DOT_ENV_SESSION_DRIVER
ARG DOT_ENV_SESSION_LIFETIME
ARG DOT_ENV_QUEUE_DRIVER
ARG DOT_ENV_SESSION_STORE
ARG DOT_ENV_REDIS_HOST
ARG DOT_ENV_REDIS_PASSWORD
ARG DOT_ENV_REDIS_PORT
ARG DOT_ENV_MAIL_DRIVER
ARG DOT_ENV_MAIL_HOST
ARG DOT_ENV_MAIL_PORT
ARG DOT_ENV_MAIL_USERNAME
ARG DOT_ENV_MAIL_PASSWORD
ARG DOT_ENV_MAIL_ENCRYPTION
ARG DOT_ENV_PUSHER_APP_ID
ARG DOT_ENV_PUSHER_APP_KEY
ARG DOT_ENV_PUSHER_APP_SECRET
ARG DOT_ENV_PUSHER_APP_CLUSTER

#
# base
#
RUN apk update \
  && apk upgrade \
  && apk add --no-cache --virtual .gd-deps \
      freetype-dev \
      libjpeg-turbo-dev \
      libpng-dev \
      libwebp-dev \
  && apk add --no-cache --virtual .zip-deps \
      libzip-dev \
  && apk add --no-cache --virtual .envsubst-deps \
      libintl \
  && apk add --no-cache --virtual .gettext \
      gettext \
  && apk add --no-cache --virtual .intl \
      icu-dev \
  && cp /usr/bin/envsubst /usr/local/bin/envsubst \
  && pecl update-channels \
  && docker-php-ext-install \
      pdo_mysql \
      opcache \
      intl \
  && docker-php-ext-configure gd \
      --with-freetype-dir=/usr/include/ \
      --with-jpeg-dir=/usr/include/ \
      --with-png-dir=/usr/include/ \
      --with-webp-dir=/usrinclude/ \
  && docker-php-ext-configure zip \
      --with-libzip \
  && docker-php-ext-install \
      gd \
      zip \
  && rm -rf /tmp/pear ~/.pearrc \
  && apk del .gettext

#
# composer
#
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && chmod +x /usr/local/bin/composer \
  && composer global require hirak/prestissimo

#
# Create app root directory
#
RUN mkdir -p /var/www/app
COPY ./ /var/www/app
WORKDIR /var/www/app

#
# run compose install and remove tests files when ENVIRONMENT is not dev or not development
#

RUN if [ ! "${ENVIRONMENT}" = "dev" -a ! "${ENVIRONMENT}" = "development" ]; then \
    composer install --no-dev \
    && find ./vendor -iname tests -type d | xargs rm -rf \
    && find ./vendor -iname tests -type d | xargs rm -rf \
;fi

#
# .env
#
RUN envsubst \
    "\$DOT_ENV_APP_NAME \
    \$DOT_ENV_APP_ENV \
    \$DOT_ENV_APP_KEY \
    \$DOT_ENV_APP_DEBUG \
    \$DOT_ENV_APP_URL \
    \$DOT_ENV_LOG_CHANNEL \
    \$DOT_ENV_DB_CONNECTION \
    \$DOT_ENV_DB_HOST \
    \$DOT_ENV_DB_PORT \
    \$DOT_ENV_DB_DATABASE \
    \$DOT_ENV_DB_USERNAME \
    \$DOT_ENV_DB_PASSWORD \
    \$DOT_ENV_BROADCAST_DRIVER \
    \$DOT_ENV_CACHE_DRIVER \
    \$DOT_ENV_SESSION_DRIVER \
    \$DOT_ENV_SESSION_LIFETIME \
    \$DOT_ENV_QUEUE_DRIVER \
    \$DOT_ENV_REDIS_HOST \
    \$DOT_ENV_REDIS_PASSWORD \
    \$DOT_ENV_REDIS_PORT \
    \$DOT_ENV_MAIL_DRIVER \
    \$DOT_ENV_MAIL_HOST \
    \$DOT_ENV_MAIL_PORT \
    \$DOT_ENV_MAIL_USERNAME \
    \$DOT_ENV_MAIL_PASSWORD \
    \$DOT_ENV_MAIL_ENCRYPTION \
    \$DOT_ENV_PUSHER_APP_ID \
    \$DOT_ENV_PUSHER_APP_KEY \
    \$DOT_ENV_PUSHER_APP_SECRET \
    \$DOT_ENV_PUSHER_APP_CLUSTER"  \
    < /var/www/app/.env.template > /var/www/app/.env \
  && rm -rf /var/www/app/.env.template

#
# Permissions
#
RUN chgrp -R www-data \
    /var/www/app/storage \
    /var/www/app/bootstrap/cache \
  && chmod -R ug+rwx \
      /var/www/app/storage \
      /var/www/app/bootstrap/cache

# volumes でマウントしているケースで、 uid, gid を変更したい場合: 主に docker-machine や linux で volumes を用いているマウントしている場合、ホスト側の uid, gid が設定される為、それらの uid, gid をプロセス実行ユーザーに override する事で Permission の問題を回避する。
ARG CHANGE_UID_GID="false"
ARG CHANGE_UID_GID_BEFORE_UID
ARG CHANGE_UID_GID_BEFORE_GID
RUN if [ "${CHANGE_UID_GID}" = "true" ]; then \
    apk add shadow \
    && usermod -u "${CHANGE_UID_GID_BEFORE_UID}" www-data && groupmod -g "${CHANGE_UID_GID_BEFORE_GID}" www-data \
;fi
