# Use the official PHP image with Apache
FROM php:8.2-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -i -e '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Set the DocumentRoot to your application's public directory
# The correct folder is "LavaLust-Framework"
RUN sed -i -e "s|/var/www/html|/var/www/html/LavaLust-Framework|g" /etc/apache2/sites-available/000-default.conf

# Copy your application files into the container
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80
