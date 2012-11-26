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
1. localhost for memcache is not passed through config.in and is manually configured right now. 

Warning - 
1. root is default user for connecting to mysql databases. Change it to something other than root. 

For DynamoDB - 

1. Install the ASWSSDKforPHP http://aws.amazon.com/sdkforphp/
2. Configure the  Access credentials 
3. Configure the right path in dynamodb.php
4. Make sure you have dynamodb table created with  name 'sessions'

Pass the following as user-data when launching the EC2 Instance - 

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


---------


Note: Default username and password are admin and admin123 for the console
