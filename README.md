# wamcr
Wheels Automarket and Car Rental

# Readme

# AWS instance
```
http://ec2-54-91-146-112.compute-1.amazonaws.com/projectvrs/
```

## Install apache
```sh
$    sudo apt update
$    sudo apt install apache2
```
## Install php
```sh
$ sudo apt install php libapache2-mod-php
$ sudo systemctl restart apache2
```

## Enable rewrite
```sh
$ sudo a2enmod rewrite
$ sudo systemctl restart apache2
```

## Modify default.conf (000-default.conf)
```sh
$ sudo nano /etc/apache2/sites-available/000-default.conf
```
Add the following lines before the ‘</VirtualHost>’ closing tag.
```
    <Directory /var/www/html>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Require all granted
    </Directory>
```
```
$ sudo systemctl restart apache2
```

## Install mysql and phpmyadmin
```
$ sudo apt install mysql-server
$ sudo apt install phpmyadmin php-mbstring php-gettext
$ sudo phpenmod mbstring
$ sudo systemctl restart apache2
```

## Clone the repo
Clone the repo into /var/www/html/wamcr

## Create a database
```
carrental
```

## Configure database.php
```
application/config/database.php
```


[end]
