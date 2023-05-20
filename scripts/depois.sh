#!/bin/bash

# Define o diretório raiz do projeto
PROJECT_DIR="/www/wwwroot/conect.app"

# Define as permissões necessárias para cada pasta específica do projeto
PERMISSIONS=(
  ["$PROJECT_DIR/writable"]="+w"
  ["$PROJECT_DIR/writable/uploads"]="+w"
  ["$PROJECT_DIR/app/Logs"]="+w"
)

# Define as permissões padrão para arquivos e diretórios
DEFAULT_PERMISSIONS="0644"
DEFAULT_DIRECTORY_PERMISSIONS="0755"

# Define a função para definir as permissões recursivamente
set_permissions_recursive() {
  local path=$1
  local permissions=$2

  # Define as permissões para o diretório atual
  chmod "$permissions" "$path"

  # Define as permissões para todos os arquivos dentro do diretório atual
  find "$path" -type f -exec chmod "$permissions" {} \;

  # Define as permissões para todos os subdiretórios dentro do diretório atual
  find "$path" -type d -exec chmod "${permissions%?}" {} \;
}

# Define as permissões para cada pasta específica do projeto
for folder in "${!PERMISSIONS[@]}"; do
  permissions="${PERMISSIONS[$folder]}"

  # Verifica se o diretório existe antes de definir as permissões
  if [ -d "$folder" ]; then
    set_permissions_recursive "$folder" "$permissions"
  fi
done

# Define as permissões padrão para arquivos e diretórios do projeto
set_permissions_recursive "$PROJECT_DIR" "$DEFAULT_PERMISSIONS"
set_permissions_recursive "$PROJECT_DIR" "$DEFAULT_DIRECTORY_PERMISSIONS"

# Executa o composer no modo de produção do CodeIgniter 4
cd "$PROJECT_DIR"
composer install --no-dev --optimize-autoloader --no-interaction

# Limpa o cache do CodeIgniter 4 (opcional)
php spark cache:clear
