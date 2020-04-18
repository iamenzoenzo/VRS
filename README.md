# wamcr
Wheels Automarket and Car Rental

# Readme

# Use Cases by Stakeholders 

##    End-User 
UC-01 - View the list of available vehicles for reservation (/cars)

UC-02 - View contact information of the company (/contact)

UC-03 - View frequently asked questions (/faq)

UC-04 - View estimated rental cost (/estimate)

##    VRS Internal User 
UC-05 - Add rental booking (/bookings/create) (with 1 issue)

```UC-06 - Modify rental booking ```

UC-07 - View rental booking (/bookings)

```UC-08 - Delete rental booking ```

UC-09 - Add vehicle information (/cars/create)

```UC-10 - Modify vehicle information ```

UC-11 - View vehicle information (/cars)

```UC-12 - Delete vehicle information ```

UC-13 - Add client information (/clients/create)
UC-14 - Modify client information (/clients/edit)
UC-15 - View client information (/clients)
UC-16 - Delete client information (/clients/delete)

##    VRS Administrator 
UC-17 - View to Admin portal
UC-18 - Add VRS Internal Users (/users/create)
UC-19 - Modify VRS Internal Users (/users/edit)
UC-20 - View VRS Internal Users (/users)
UC-21 - Delete VRS Internal Users (users/delete)
```UC-22 - View Reservation Report ```
```UC-23 - View Earnings Report ```

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
