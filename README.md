# Biblo
## Sobre
Sistema web simples de empréstimo e devolução de livros para bibliotecas.

![Badge](https://img.shields.io/github/license/kleysonfmadruga/biblo)
![Badge](https://img.shields.io/github/last-commit/kleysonfmadruga/biblo)

## Tecnologias

O projeto foi construido utilizando as seguintes ferramentas e tecnologias:

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)

## Testando localmente

### Pré-requisitos

Antes de começar, é necessário que você tenha o [PHP](https://www.php.net/), o [Git](https://git-scm.com/), o [Composer](https://getcomposer.org/) e o [MySQL](https://www.mysql.com/) instalados na sua máquina. Além disso, é preciso que haja um banco de dados chamado 'laravel' no servidor de banco de dados MySQL. Para fazer alterações no projeto, recomendo a utilização de algum editor de código, como o [VSCode](https://code.visualstudio.com/)

### Rodando a aplicação

```bash
# Clone este repositório
$ git clone https://github.com/kleysonfmadruga/biblo

# Entre na pasta do projeto
$ cd biblo

# Instale as dependências de PHP do Laravel
$ composer update

# Instale as dependências de Javascript do Laravel
$ npm install

# Compile os assets de CSS e Javascript
$ npm run dev

# Copie as variáveis de ambiente do arquivo de exemplo
$ cp .env.example .env

# Gere uma nova chave para a aplicação
$ php artisan key:generate

# Execute as migrações para criar as tabelas no banco de dados
$ php artisan migrate

# Crie um link simbólico da pasta storages para a pasta public para torná-la pública
$ php artisan storage:link

# Inicie o servidor
$ php artisan serve

# O servidor iniciará na porta: 8000 - acesse o site por <http://localhost:8000>
```

## Autor

<a href="https://github.com/kleysonfmadruga">
 <img style="border-radius: 100px;" src="https://avatars2.githubusercontent.com/u/40344712?s=460&u=22908c3d03495629b06a09ce724a510d4a9dc96a&v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Kleyson Madruga</b></sub>
</a>

Feito de muito 💙 por Kleyson Madruga 👋 Entre em contato  
[![Linkedin Badge](https://img.shields.io/badge/-Kleyson-blue?style=flat&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/kleyson-madruga)](https://www.linkedin.com/in/kleyson-madruga/)
[![Gmail Badge](https://img.shields.io/badge/-kleysonfmadruga26@gmail.com-d14836?style=flat&logo=Gmail&logoColor=white&link=mailto:kleysonfmadruga26@gmail.com)](mailto:kleysonfmadruga26@gmail.com)
