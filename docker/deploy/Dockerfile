FROM alpine:3.8

RUN apk add --update \
    php7-fpm \
    php7-apcu \
    php7-ctype \
    php7-curl \
    php7-dom \
    php7-gd \
    php7-fileinfo \
    php7-iconv \
    php7-imagick \
    php7-json \
    php7-intl \
    php7-mbstring \
    php7-opcache \
    php7-openssl \
    php7-pdo \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-mysqli \
    php7-xml \
    php7-zlib \
    php7-phar \
    php7-tokenizer \
    php7-session \
    php7-simplexml \
    php7-sqlite3 \
    php7-xdebug \
    php7-xmlwriter \
    php7-zip \
    php7-redis \
    make \
    curl \
	git

RUN apk add --no-cache openssh rsync

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/* && \
    curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

RUN composer global require deployer/deployer
RUN composer global require deployer/recipes --dev

ENV PATH /root/.composer/vendor/bin:$PATH