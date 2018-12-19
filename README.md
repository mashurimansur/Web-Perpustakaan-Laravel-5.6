# Sistem Informasi Perspustakan Menggunakan Laravel 5
ini adalah sistem informasi perpustakaan berbasis web yang menggunakan Laravel 5.6
pastikan PHP kalian >7.0

## Table of Contents

- [Installation](#installation)


### Installation

1. Clone repository
```
$ git clone https://github.com/mashurimansur/Web-Perpustakaan-Laravel-5.6.git
```

2. Enter folder
```
$ cd Web-Perpustakaan-Laravel-5.6
```

3. Install composer dependencies
```
~/Web-Perpustakaan-Laravel-5.6$ composer install
```

4. Configure .env file, edit file with next command `$ nano .env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=secret
```

5. Run migrations
```
~/Web-Perpustakaan-Laravel-5.6$ php artisan migrate
```
