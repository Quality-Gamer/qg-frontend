# Use a imagem oficial do PHP para Laravel no Render
FROM ghcr.io/render-examples/laravel:latest

# Defina o diretório de trabalho para o diretório do aplicativo Laravel
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . .

# Instale as dependências do Composer
RUN composer install --optimize-autoloader --no-dev

# Copie o arquivo de ambiente
COPY .env.example .env

# Gere a chave de aplicativo Laravel
RUN php artisan key:generate

# Limpe o cache do Laravel
RUN php artisan config:cache
RUN php artisan route:cache

# Exponha a porta 8080 para tráfego web
EXPOSE 8080

# Inicie o servidor web embutido do Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]