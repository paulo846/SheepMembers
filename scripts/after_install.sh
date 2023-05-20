#!/bin/bash
cd /www/wwwroot/conect.app/scripts

sudo chmod +x after_install.sh

cd /www/wwwroot/conect.app

# Outras ações pós-instalação
composer install --no-dev
