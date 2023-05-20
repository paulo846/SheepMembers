#!/bin/bash
sudo su
cd /www/wwwroot/conect.app
composer update --no-dev yes
chmod -R 777 /www/wwwroot/conect.app