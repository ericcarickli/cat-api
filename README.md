# Implantação

-Instalar o xampp
-Inicializar o xampp
-Criar Banco de Dados mySql no localhost/phpmyadmin
-Criar no projeto clonado o arquivo .env copiando os dados do arquivo .envexample
-Conectar banco dados criado no .env
-Composer update na raiz do projeto
-php artisan migrate
-php artisan:key generate
-php artisan jwt:secret
-php artisan serve

# Documentação

## Breeds

| HTTP Request | Endpoint | Body | Descrição |
| ------ | ------ | ------ | ------ |
| POST | /auth/login | - | Vaerifica login e fornece token de acesso JWT |
| POST | /breed | - | Insere no banco os dados do TheCatAPI |
| POST | /breed/add | - | Insere manualmente no banco dados de um breed  |
| GET | /breed | - | Lista todos os gatos |
| GET | breed/id | - | Lista um gato específico |
| DELETE | breed/id | - | Deleta um gato específico |
