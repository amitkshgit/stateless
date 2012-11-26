For memcache ---

<<<<<<< HEAD
Pass the following as user-data when EC2 instance in being launched - 

#!/bin/bash
=======
MAKE SURE YOU SET ALL PARAMETERS PROPERLY IN config.inc

ALSO MAKE SURE THAT file.sql IS EXECUTED AGAINST A RUNNING MYSQL DATABASE. THIS CREATES THE ENTIRE SCHEMA.

Following are the modules generally required - 
>>>>>>> 90302949d4c1345409a1b76b4f280799c13f8b16
yum -y update
yum -y install httpd php php-devel mysql mysql-server php-mysql memcached gcc zlib-devel make git 
cd /usr/src
wget http://pecl.php.net/get/memcache-2.2.5.tgz
tar zxvf memcache-2.2.5.tgz
cd memcache-2.2.5
phpize
./configure
make
make install
<<<<<<< HEAD
echo extension = "memcache.so" >> /etc/php.ini
cd /var/www/html ; git init
git clone git://github.com/amitkshgit/stateless.git
service httpd restart
service mysqld restart
service memcached restart ; mysql -u root < /var/www/html/stateless/memcache/file.sql 



KNOWN BUG - 

1. Configuring localhost for memcache in config.inc does not work and has been hard coded righ now.
=======
vi /etc/php.ini 
echo extension = "memcache.so" >> /etc/php.ini
cd /var/www
cd html
git init
git clone git://github.com/amitkshgit/stateless.git
mysql -u root -p aws < file.sql 
service httpd restart
service mysqld restart
service memcached restart

KNOWN BUG - 

1. Configuring localhost for memcache in config.inc does not work and has to be manually configured in sesstest.php
>>>>>>> 90302949d4c1345409a1b76b4f280799c13f8b16
