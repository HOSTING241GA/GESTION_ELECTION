# Utilisez une image de base avec PHP
FROM ubuntu/apache2:latest

# Installation des dépendances nécessaires
RUN apt-get update && apt-get install -y libpq-dev

# Installation de l'extension PostgreSQL pour PHP
RUN docker-php-ext-install pdo pdo_pgsql

# Copie des fichiers de l'application PHP dans le conteneur
COPY ./ /var/www/html

# Configuration de l'application
# Si nécessaire, copiez les fichiers de configuration spécifiques de votre application ici.

# Exposition du port 80 (Apache)
EXPOSE 80

# Commande pour démarrer Apache
CMD ["apache2-foreground"]
