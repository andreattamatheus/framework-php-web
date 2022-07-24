### Introdução
O projeto foi elaborado tendo como base a estrutura do Laravel que, funciona, na arquitetura de MVC. Foram utilizados em sua maioria os padrões do Laravel, tanto de nomenclatura quanto de disposição das pastas.

Roteamento;
Validações de Input;
Implementação de views;

### Bibliotecas
"vlucas/phpdotenv": Variáveis de ambiente.

# Requisitos
- O sistema deverá ser desenvolvido utilizando a linguagem PHP (de preferência a versão mais nova) ou outra linguagem se assim foi especificado para sua avaliação por nossa equipe.
- Você deve criar um CRUD que permita cadastrar as seguintes informações:
	- **Produto**: Nome, SKU (Código), preço, descrição, quantidade e categoria (cada produto pode conter uma ou mais categorias)
	- **Categoria**: Código e nome.
- Salvar as informações necessárias em um banco de dados (relacional ou não), de sua escolha

# Roadmap
- [x] CRUD Produto;
- [x] CRUD Categoria;
- [ ] Upload de imagem no cadastro de produtos;
- [ ] Gerar logs das ações;
- [ ] Testes automatizados com informação da cobertura de testes;


# Passo a passo

Acesse a pasta ./source e execute o comando composer install.

# Configurações do ambiente
Informações do banco de dados e url do ambiente de desenvolvimento, devem ser informadas dentro do arquivo ```.env.example```. Finalizado ele, renomear para ```.env```.

HOST="http://localhost"
PORT=8000
APP_NAME="Desafio Webjump"
APP_URL=http://localhost:8000

DB_CONNECTION="mysql"
DB_HOST="localhost"
DB_PORT=3306
DB_DATABASE="assessment-backend-xp"
DB_USERNAME="root"
DB_PASSWORD=""


# Banco de dados
Crie o schema com nome e execute os comandos Sql do arquivo dentro da pasta  ```./source/database/migrations/create_table.sql```.

# Iniciando o server
Dentro de ./source, execute o comando.
```php -S localhost:8000```
