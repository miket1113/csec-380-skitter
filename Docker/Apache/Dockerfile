FROM php:7.2.11-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN a2enmod rewrite
#RUN a2enmod http2
#RUN a2dismod mpm_prefork
#RUN a2enmod mpm_event
RUN a2enmod headers
#RUN a2enmod ssl

COPY conf/security.conf /etc/apache2/conf-available/
COPY conf/000-default.conf /etc/apache2/sites-enabled/
#COPY conf/default-ssl.conf /etc/apache2/sites-enabled/
COPY conf/apache2.conf /etc/apache2/
#COPY conf/TLS/localhost.crt /etc/ssl/certs/localhost.crt
#COPY conf/TLS/localhost.key /etc/ssl/private/localhost.key

#COPY index.html /var/www/html/index.html 

