dockerfile
Utiliser l'image de base PHP avec Apache
FROM php:8.0-apache

Installer les extensions nécessaires pour PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

Activer mod_rewrite pour Apache
RUN a2enmod rewrite