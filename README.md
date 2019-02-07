
УСТАНОВКА
------------

### Первый шаг

Выполните в Git следующую команду

~~~
git clone https://github.com/voinmerk/yii2-testwork.git
~~~

Далее вполните команду для установки пакетов Composer

~~~
composer install
~~~

### Второй шаг

Перейдите в `config/web.php`, найдите следующий код и заполните поля `login` и `password`:

```php
'components' => [

    // ...

    'siteApi' => [
      'class' => 'app\services\soap\Client',
      'url' => 'https://api-beta.reformagkh.ru/api/wsdl',
      'login' => '[login]', // your login
      'password' => '[password]', // your password
      'options' => [
        'cache_wsdl' => WSDL_CACHE_NONE,
      ],
    ],

    // ...

],
```

### Третий шаг

Импортируйте базу данных `database.sql` в ваш сервер MySQL
Файл расположен в корневой папке

Файл `config/db.php` отвечает за подключение базы данных к приложение

```php

    // ...

    'dsn' => 'mysql:host=localhost;dbname=mydatabase', // test_work1
    'username' => 'root', // username
    'password' => '', // password

    // ...

```

### Четвёртый шаг

Используйте следующий логин и пароль для входа:

Url: `http://[your domain]/login`

~~~
Login - admin
Password - 123456
~~~