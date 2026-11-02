#!/bin/sh
set -e

# Default PORT to 80 if not provided by Render or local environment
PORT="${PORT:-80}"

# Configure Apache ports and virtual hosts dynamically at container startup
sed -i "s/Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:[0-9]*>/<VirtualHost \*:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Ensure directory permissions are intact on persistent disks or container reboots
mkdir -p /var/www/html/storage/documents \
         /var/www/html/storage/logs \
         /var/www/html/public/uploads

chown -R www-data:www-data /var/www/html/storage /var/www/html/public/uploads
chmod -R 775 /var/www/html/storage /var/www/html/public/uploads

echo "Starting Apache on port ${PORT}..."
exec apache2-foreground

