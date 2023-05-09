#!/bin/bash
cd /www/wwwroot/conect.app
sudo composer update --no-dev
sudo chmod -R 777 /www/wwwroot/conect.app/writable
