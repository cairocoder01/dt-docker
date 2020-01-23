FROM wordpress:5.3-php7.2-apache

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev
COPY server.crt /etc/apache2/ssl/server.crt
COPY server.key /etc/apache2/ssl/server.key
COPY dev.conf /etc/apache2/sites-enabled/dev.conf
RUN docker-php-ext-install mysqli pdo pdo_mysql zip mbstring
RUN a2enmod rewrite
RUN a2enmod ssl
RUN service apache2 restart

#RUN curl -o dt-theme.tar.gz -fSL "https://github.com/DiscipleTools/disciple-tools-theme/archive/0.11.0.tar.gz"; \
#  tar -xzf dt-theme.tar.gz -C /usr/src; \
#  rm dt-theme.tar.gz; \
#  \

RUN apt-get update
RUN apt-get install nano
