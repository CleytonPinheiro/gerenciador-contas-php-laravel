
# Projeto Full-Stack CRUD de contas

Projeto desenvolvido para teste de back e front end.
## Rodando localmente

Clone o projeto completo:

```bash
  git clone https://github.com/CleytonPinheiro/gerenciador-contas-php-laravel
```

Entre no diretório do projeto:

```bash
  cd api-accounts
```

Instale as dependências

```bash
  composer install
```

Inicie o servidor

```bash
 php artisan serve
```
Retorn a pasta a raiz e entre na pasta do front e inicie o servidor
```bash
 cd app
 php -S localhost:7000
```

SUBINDO O BANCO COM DOCKER
- retorne a pasta raiz e execute:
```bash
 cd ..
 docker-compose up
```
- O banco será executado em localhost:9000 (caso não ocorrer algum problema).

## Documentação da API

#### Retorna todas as contas

```http
  GET /api/conta
```

#### Retorna uma conta específica

```http
  GET /api/conta/${id}
```

#### Cadastra novas contas

```http
  POST /api/conta
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. |
| `start_account` | `date` | **Obrigatório**. |
| `holder_id` | `number` |  |
| `credit` | `number` |  |
| `credit` | `number` |  |
| `status` | `string` |  |

#### Atualiza uma conta específica

```http
  PUT /api/conta/${id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `name` | `string` | **Obrigatório**. |
| `start_account` | `date` | **Obrigatório**. |
| `holder_id` | `number` |  |
| `credit` | `number` |  |
| `credit` | `number` |  |
| `status` | `string` |  |

#### Deleta conta específica

```http
  DELETE /api/conta/${id}
```
## Melhorias

Sempre existe onde melhorar tanto no código quanto no uso do sistema como usuário final, um dos pontos que podemos implementar e melhoras seria transferências entre usuários do sistema, agendamentos, simulando conta bancária.

## Stack utilizada

**Front-end:** HTML, php

**Back-end:** Laravel versão 8.

**Banco dados:** MySql

** Infra:** Docker

** HttpClient:** Insomnia