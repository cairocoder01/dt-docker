FROM wordpress:4.9-php7.2-apache

RUN curl -o dt-theme.tar.gz -fSL "https://github.com/DiscipleTools/disciple-tools-theme/archive/0.11.0.tar.gz"; \
  tar -xzf dt-theme.tar.gz -C /usr/src; \
  rm dt-theme.tar.gz; \
  \