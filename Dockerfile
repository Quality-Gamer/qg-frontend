# Use a imagem base com PHP e Laravel
FROM shinsenter/laravel

# Adicione o download e instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho para o diretório do aplicativo Laravel
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . .

# Instale as dependências do Composer
RUN composer install --optimize-autoloader --no-dev

RUN composer update

# Copie o arquivo de ambiente
COPY .env.example .env

# Gere a chave de aplicativo Laravel
RUN php artisan key:generate

# Limpe o cache do Laravel
RUN php artisan config:cache
RUN php artisan route:cache

# Exponha a porta 80 para tráfego web
EXPOSE 80

# Inicie o servidor web embutido do Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]