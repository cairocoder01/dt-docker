FROM wordpress:4.9-php7.2-apache

RUN echo "deb http://ftp.debian.org/debian stretch-backports main" >> /etc/apt/sources.list.d/backports.list
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
        nano \
        python-certbot-apache -t stretch-backports

COPY server.crt /etc/apache2/ssl/server.crt
COPY server.key /etc/apache2/ssl/server.key
COPY dev.conf /etc/apache2/sites-enabled/dev.conf
#RUN docker-php-ext-install mysqli pdo pdo_mysql zip mbstring
RUN a2enmod rewrite
#RUN a2enmod ssl

# Initialize certbot for SSL certs
# https://certbot.eff.org/docs/using.html#certbot-command-line-options
RUN certbot --apache \
            --non-interactive \
            --domain local.disciple.tools \
            -m test@gmail.com \
            --test-cert \
            --agree-tos \
            --no-verify-ssl
RUN service apache2 restart

#RUN curl -o dt-theme.tar.gz -fSL "https://github.com/DiscipleTools/disciple-tools-theme/archive/0.11.0.tar.gz"; \
#  tar -xzf dt-theme.tar.gz -C /usr/src; \
#  rm dt-theme.tar.gz; \
#  \
