For memcache ---

Pass the following as user-data when EC2 instance in being launched - 

#!/bin/bash
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
echo extension = "memcache.so" >> /etc/php.ini
cd /var/www/html ; git init
git clone git://github.com/amitkshgit/stateless.git
service httpd restart
service mysqld restart
service memcached restart ; mysql -u root < /var/www/html/stateless/memcache/file.sql 



KNOWN BUG - 

1. Configuring localhost for memcache in config.inc does not work and has been hard coded righ now.
