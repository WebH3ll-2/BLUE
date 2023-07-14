#!/bin/bash
cd /var/www/html/cau-michelin
apt-get install wget -y
wget https://getcomposer.org/composer.phar
php composer.phar install