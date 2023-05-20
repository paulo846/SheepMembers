#!/bin/bash

# Define o diretório raiz do projeto
PROJECT_DIR="/www/wwwroot/conect.app"

# Altera para o diretório do projeto
cd "$PROJECT_DIR"

# Executa o composer no modo de produção do CodeIgniter 4
sudo composer install --no-dev --optimize-autoloader --no-interaction -y
