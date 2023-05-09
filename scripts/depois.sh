#!/bin/bash
cd /www/wwwroot/conect.app
composer update --no-dev
chmod -R 777 /www/wwwroot/conect.app/writable
