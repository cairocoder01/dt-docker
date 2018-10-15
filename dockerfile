FROM wordpress:4.9-php7.2-apache

# Enable Apache Rewrite Module
#RUN a2enmod rewrite

#RUN curl -o dt-theme.tar.gz -fSL "https://github.com/DiscipleTools/disciple-tools-theme/archive/0.11.0.tar.gz"; \
#  tar -xzf dt-theme.tar.gz -C /usr/src; \
#  rm dt-theme.tar.gz; \
#  \

RUN apt-get update
RUN apt-get install nano
