#!/bin/bash
sudo cd /www/wwwroot/conect.app/scripts

sudo chmod +x after_install.sh

sudo cd /www/wwwroot/conect.app

# Outras ações pós-instalação
composer install --no-interaction --optimize-autoloader
