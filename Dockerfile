# Usar uma imagem do PHP oficial com suporte a FPM (FastCGI Process Manager) e extensões necessárias
FROM php:7.4-fpm

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip mbstring exif pcntl bcmath xml intl

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir o diretório de trabalho como o diretório da aplicação Laravel
WORKDIR /var/www/html

# Copiar os arquivos do projeto Laravel para o contêiner
COPY . .

# Instalar as dependências do Composer
RUN composer install --optimize-autoloader --no-dev

# Definir as permissões corretas nos arquivos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Expor a porta 9000 para o servidor FPM do PHP
EXPOSE 9000

# Comando padrão para iniciar o servidor PHP FPM
CMD ["php-fpm"]