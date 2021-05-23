FROM php:5.7-fpm-alpine

ENV TIMEZONE Asia/Shanghai
ENV PHP_MEMORY_LIMIT 512M
ENV MAX_UPLOAD 50M
ENV PHP_MAX_FILE_UPLOAD 200
ENV PHP_MAX_POST 100M


RUN apk --update add tzdata \
   libjpeg-turbo-dev \
     libpng-dev \
   freetype-dev \
  && cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
  && echo "${TIMEZONE}" > /etc/timezone
  

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/freetype2 --with-png-dir=/usr --enable-gd-native-ttf --with-jpeg-dir=/usr \
    && docker-php-ext-install mysqli gd pdo_mysql opcache zip 

RUN mkdir /www \
  && apk del tzdata curl \
  && rm -rf /var/cache/apk/*
  

COPY _files /tmp/
COPY src /var/www/html

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add --update --no-cache tar nginx mysql mysql-client \
    && mkdir /run/nginx \
    # mysql ext
    && docker-php-source extract \
    && docker-php-ext-install mysql mysqli pdo_mysql \
    && docker-php-source delete \
    # init mysql
    && mysql_install_db --user=mysql --datadir=/var/lib/mysql \
    && sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysqladmin -uroot password 'root' \
    && mysql -e "source /var/www/html/db.sql;" -uroot -proot \
    # configure file
    && mv /tmp/flag.sh /flag.sh \
    && mv /tmp/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint \
    && chmod +x /usr/local/bin/docker-php-entrypoint \
    && mv /tmp/nginx.conf /etc/nginx/nginx.conf \
    && chown -R www-data:www-data /var/www/html \
    # clear
    && rm -rf /var/www/html/db.sql \
    && rm -rf /tmp/*

WORKDIR /var/www/html

EXPOSE 80

VOLUME ["/var/log/nginx"]

CMD ["/bin/bash", "-c", "docker-php-entrypoint"]