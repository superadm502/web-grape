#!/bin/sh

# Run Laravel migration (by force, since it would be a prod-environment)
php artisan migrate --force