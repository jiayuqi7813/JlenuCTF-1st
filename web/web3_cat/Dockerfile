FROM dasctfbase/web_php73_apache_mysql


# Install dependencies

ENV APACHE_RUN_USER  www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR   /var/log/apache2
ENV APACHE_PID_FILE  /var/run/apache2/apache2.pid
ENV APACHE_RUN_DIR   /var/run/apache2
ENV APACHE_LOCK_DIR  /var/lock/apache2
ENV APACHE_LOG_DIR   /var/log/apache2

COPY ./html /var/www/html

RUN mkdir -p $APACHE_RUN_DIR && mkdir -p $APACHE_LOCK_DIR && mkdir -p $APACHE_LOG_DIR && chmod -R 777 /var/www/html/
# Setting workdir for docker
WORKDIR /
RUN mkdir sandboxed_bin;cp /bin/cat sandboxed_bin

# Exposing Apache port to host
EXPOSE 80

CMD ["/usr/sbin/apache2", "-D",  "FOREGROUND"]
