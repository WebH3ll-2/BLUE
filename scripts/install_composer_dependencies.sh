#!/bin/bash
cd /var/www/html/cau-michelin
apt-get install wget -y
wget -O composer.phar https://getcomposer.org/composer.phar
php composer.phar install
