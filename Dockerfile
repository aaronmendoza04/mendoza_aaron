# Use the official PHP 8.2 Apache image as the base
FROM php:8.2-apache

# Install the pdo_mysql extension for database connectivity
RUN docker-php-ext-install pdo_mysql

# Enable the Apache rewrite module, which is necessary for clean URLs
RUN a2enmod rewrite

# Update the Apache configuration to allow .htaccess overrides
# This is crucial for frameworks like LavaLust that use .htaccess for routing
RUN sed -i 's/<Directory \/var\/www\/html\/>/<Directory \/var\/www\/html\/>\n\tAllowOverride All/' /etc/apache2/apache2.conf

# Set the DocumentRoot for the web server to the 'public' directory of your application
# This is the standard practice for modern PHP frameworks
RUN sed -i -e 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copy all the application files from the current directory into the container's web root
COPY . /var/www/html/

# Fix file permissions to allow the web server to read and write files
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Expose port 80 to make the web service accessible
EXPOSE 80
