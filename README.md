# Radius Manager

Mitul Gadhiya | Prakash Gujarati

(c) JAYNATH INFOTECH

# Overview

The  purpose  of  this  project  is  to  provide  an  Administration  and  End  User  GUI  interface  for  FreeRadius  entries  into  the  MySQL  Database.

## Installation for UBUNTU 16.04.XX

# Login as ROOT

sudo su

# Install GIT, CURL, WGET and ZIP

apt-get install -y git curl wget zip

# Remove php 5 and apache2 if previously installed

sudo apt-get purge php5-fpm apache2

sudo apt-get --purge autoremove

# PHP 7 (Needed for Laravel 5.7)

apt-get install -y software-properties-common

apt-get install -y python-software-properties

add-apt-repository -y ppa:ondrej/php

apt-get update

apt-get install -y php7.2 php7.2-fpm php-mysql php7.2-mysql php-mbstring php-gettext php-doctrine-dbal php-xml php-zip

sudo -- sh -c "echo 'cgi.fix_pathinfo=0' >> /etc/php/7.2/fpm/php.ini"

sudo -- sh -c "echo 'cgi.fix_pathinfo=0' >> /etc/php/7.2/cli/php.ini"

sudo service php7.2-fpm restart

# Install Composer for Laravel

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# Install MySQL Server

apt-get install mysql-server

# Install NGINX Server

apt-get install nginx

# Install FreeRadius 3.0

apt-add-repository -y ppa:freeradius/stable-3.0

apt-get update

apt-get install -y freeradius

service freeradius start

apt-get install -y freeradius-mysql

service freeradius stop

ln -s /etc/freeradius/mods-available/sql /etc/freeradius/mods-enabled/sql

ln -s /etc/freeradius/sites-available/dynamic-clients /etc/freeradius/sites-enabled/dynamic-clients

# Create MySQL Database and User for Application

mysql -uroot -p

<< ENTER YOUR MYSQL ROOT PASSWORD WHEN PROMPT >>

CREATE DATABASE radius;
GRANT ALL ON radius.* TO radius@localhost IDENTIFIED BY "radpass";
exit

# Clone Radius Manager from Github 

cd /var/www/html

git clone https://github.com/PrakashGujarati/RadiusManager.git 

chown www-data:www-data -R RadiusManager

cd RadiusManager

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan radius:install

# Set NGINX to point to Application

php artisan nginx:install

# Restart NGINX to Apply Config

service nginx restart


# (1st Sept 2019) Upgrade to latest version (Only if you already have the previous version installed.)

cd /var/www/html/RadiusManager

git pull

composer update

php artisan migrate

php artisan radius:install
