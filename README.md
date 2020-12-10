# InnovamatApi

Project made with Symfony 5 and MySql database in MacOS, with PhpStorm IDE and tested with Postman

1. Clone this repository
```
git clone https://github.com/marcgr23/InnovamatApi
```

2. Composer install
```
composer install
```

3. Create database and edit .env.local config file
```
DATABASE_URL=mysql://root:rootroot@127.0.0.1:3306/innovamat_db?serverVersion=13&charset=utf8
```

4. Execute last doctrine migration
```
bin/console doctrine:migrations:migrate
```

5. Up the project with Symfony Binary Client
```
symfony server:start
```
