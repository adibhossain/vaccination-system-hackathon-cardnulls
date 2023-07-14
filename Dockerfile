# Use the official PHP image as the base image
FROM php:7.4-apache

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the PHP application files to the container
COPY . .

# Install MySQL extension and other dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the container's port 80 to the outside world
EXPOSE 80
