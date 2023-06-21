FROM php:8.2-apache

# Defina a variável de ambiente COMPOSER_ALLOW_SUPERUSER
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV TZ=America/Sao_Paulo

# Diretório de trabalho no container
WORKDIR /var/www/html

# Copie os arquivos da sua aplicação para o container
COPY . /var/www/html

# Instala o driver MySQL para o PHP
RUN docker-php-ext-install pdo_mysql

# Instale as dependências do Composer
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        zip \
        unzip \
        git \
    && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev

# Defina as permissões corretas para o Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN find /var/www/html/storage/ -type f -exec chmod 664 {} \; \
    && find /var/www/html/storage/ -type d -exec chmod 775 {} \; \
    && chown -R www-data:www-data /var/www/html/storage/


# Apontamento do DocumentRoot do Apache para a pasta "public"
RUN sed -i -e 's/html/html\/public/g' /etc/apache2/sites-available/000-default.conf

# Ativar o módulo mod_rewrite do Apache
RUN touch /var/www/html/storage/framework/cache
RUN a2enmod rewrite

RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/storage/framework/cache

# Exponha a porta do Apache
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
