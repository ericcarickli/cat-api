# Implantação
  1. Verifique se na sua máquina possui o docker instalado
  2. Clone o projeto
  3. Na raiz do projeto, rode o seguinte comando no terminal: 
```jsx
./db_init.sh
```     
  4. Após o docker iniciar, rode o seguinte comando:
 ```jsx
./db_create.sh
```     
   4. Teste da maneira que achar melhor :)

# Documentação
  Para facilitar o teste, um arquivo Postman está na raiz do projeto, como: 
```jsx
 catapi.postman_dump.json
```     
   Basta importar no Postman para usá-lo.
## Users

| HTTP Request | Endpoint | Body | Descrição |
| ------ | ------ | ------ | ------ |
| POST | /auth/login | {email, password} | Verifica login e fornece token de acesso JWT |

Token retornado a partir da requisição em auth/login deverá ser informado no Postman, no item autorização, campo bearer token, para então conseguir fazer as requisições do endpoint /breed. 

## Breeds

| HTTP Request | Endpoint | Token | Body | Descrição |
| ------ | ------ | ------ | ------ | ------ |
| GET | /breed | JWT | - | Lista todos os breed salvos na cache |
| GET | breed/id | JWT | - | Lista um breed específico |
| POST | /breed | JWT | {name, temperament, origin, description, life_span} | Insere um novo breed no banco os dados |
| PUT | /breed/id | JWT | {name, temperament, origin, description, life_span} | Atualiza informações de um breed específico |
| DELETE | breed/id | JWT | - | Deleta um breed específico |

# Observações
Na rota /breed utilizando requisição GET, é verificado se o banco de dados está vazio, se sim, então é chamado uma função que retorna todos os dados do TheCatAPI e salva os mesmos no banco de dados, a partir disso é feita a consulta no banco de dados, e os dados retornados ficam salvos na cache que então é retornada no formato JSON.
