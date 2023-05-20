#!/bin/bash
cd /www/wwwroot/conect.app/scripts

sudo chmod +x after_install.sh

cd /www/wwwroot/conect.app

sudo composer install --no-dev

sudo chmod -R 777 /www/wwwroot/conect.app/writable
