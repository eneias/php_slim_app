# Projeto MVC em PHP para Desafio uTech

Este projeto foi desenvolvido por [Eneias Silva](http://www.eneias.com)

### Detalhes acerca do projeto ###
* Foi utilizado MVC para organização dos arquivos
* Utilizado o [Slim framewok](http://www.slimframework.com/) para gerenciar as rotas e levar as requisições aos Controllers
* Utilizado um template pronto para o Admin ([Inspina](https://wrapbootstrap.com/theme/inspinia-responsive-admin-theme-WB0R5L90S)) e outro para o site ([Freelancer](http://startbootstrap.com/template-overviews/freelancer/))

### Versões ###

* PHP: 5.3
* Slim Framework: 2.x
* MySQL: MariaDB 10.1.34

### Na pasta resources há ###
* O script de criação do banco de dados

### Para funcionar localmente ###
* Você precisará do apache e php em sua máquina local
  * Para linux:
    * [apache](https://phoenixnap.com/kb/how-to-install-apache-web-server-on-ubuntu-18-04)
    * [php](https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/)
    * [MySQL](https://dev.mysql.com/doc/mysql-installation-excerpt/8.0/en/linux-installation-yum-repo.html)
  * Para windows:
    * Basta usar o [XAMPP](https://www.apachefriends.org/index.html)
* Altere o conteúdo de config_dev.php para suas configurações de conexão com o banco de dados
* Acesse através de ser browser a pasta /public/, ali é a raiz do site
* Para o admin utilize /public/admin/

### Estrutura ###

Foi usado o paradigma MVC:

```
├── Controller --> Controladores
├── lib        --> Bibliotecas externas
├── Model      --> Modelos
├── public     --> Resources publicos das páginas htmls
├── resources  --> Resources para DB
├── vendor     --> Componentes e Frameworks 3rd party
├── View       --> Templates das views
└── Tests      --> Testes unitarios
```

h3. Para instalar as dependencias da aplicação:

1. Execute ` $ php composer.phar install `
2. Crie o database `utech` conforme `resources/schema.sql`
3. Configure o banco de dados em `config_dev.php` ou `config_prod.php`


h3. Para rodar os testes:

1. Execute ` $ php composer.phar install `
2. Crie o database `utech_test` conforme `resources/schema.sql`
3. Configure o banco de dados em `config_test.php`
4. Execute o teste com:

` $./vendor/bin/phpunit --stderr Tests/UserModelTestCase.php `