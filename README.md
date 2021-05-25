# DisCoding project

## Setup
1. You have to use a local server such as [Wamp](https://wampserver.com/) or [Mamp](https://www.mamp.info/)
1. Pull the repo in the `www/` directory of your local server
1. Import `discoding.sql` in your database
1. Follow the address of your repo. For example, if your repo is in ``www/discoding/``, the URL should be http://127.0.0.1/discoding

## Database
You can configure your database access in the file `src/model/database.php`. Simply update the default values in the `init_db()` function:
```php
$host = $_ENV['DISCODING_DB_HOST'] ?? 'localhost';
$dbname = $_ENV['DISCODING_DB_NAME'] ?? 'discoding';
$charset = $_ENV['DISCODING_DB_CHARSET'] ?? 'utf8';
$user = $_ENV['DISCODING_DB_USER'] ?? 'root';
$password = $_ENV['DISCODING_DB_PASSWORD'] ?? '';
```

For example, if you want to change the database password with `"mypassword"`, update the `$password` variable:

```php
$password = $_ENV['DISCODING_DB_PASSWORD'] ?? 'mypassword'; // just update at the right side of the ??
```