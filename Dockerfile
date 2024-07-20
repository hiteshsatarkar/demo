# Use an official Apache runtime as a parent image
FROM php:7.4-apache

# Update package lists and install additional software
RUN apt-get update && apt-get install -y \
    libapache2-mod-php \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mods
RUN a2enmod rewrite

# Copy your PHP files to Apache document root
COPY . /var/www/html/

# Specify the port number Apache will expose
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]
