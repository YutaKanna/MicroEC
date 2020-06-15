#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
FROM fluent/fluentd:v1.2

# set fluentd conf
ENV FLUENTD_CONF "app-fluent.conf"

#--------------------------------------------------------------------------
# Update and Upgrade
#--------------------------------------------------------------------------
RUN apk update \
    && apk upgrade

# COPY
COPY docker/fluentd/fluentd/etc/app-fluent.conf /fluentd/etc/app-fluent.conf
