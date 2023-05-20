#!/bin/bash
sudo apt update

cd /www/wwwroot/conect.app/scripts

sudo chmod +x after_install.sh

cd /www/wwwroot/conect.app

# Outras ações pós-instalação
sudo composer update --no-dev

sudo chmod -R 777 /www/wwwroot/conect.app/writable
