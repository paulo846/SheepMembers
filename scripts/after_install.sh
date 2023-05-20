#!/bin/bash
cd /www/wwwroot/conect.app/scripts

chmod +x after_install.sh

cd /www/wwwroot/conect.app

# Outras ações pós-instalação
composer install --no-interaction --optimize-autoloader
