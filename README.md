Pass the following as user-data when EC2 instance in being launched - 

 #!/bin/bash  
yum -y update  
yum -y install httpd php php-devel mysql mysql-server php-mysql php-xml memcached gcc zlib-devel make git  
cd /usr/src  
wget http://pecl.php.net/get/memcache-2.2.5.tgz  
tar zxvf memcache-2.2.5.tgz  
cd memcache-2.2.5  
phpize  
./configure  
make  
make install  
echo extension = "memcache.so" >> /etc/php.ini  
cd /usr/share ; wget http://pear.amazonwebservices.com/get/sdk-latest.zip  
unzip sdk-latest.zip  
cd /var/www/html ; git init  
git clone git://github.com/amitkshgit/stateless.git  
service httpd restart  
service mysqld restart  
service memcached restart ; mysql -u root < /var/www/html/stateless/memcache/file.sql  


For Memcached
- Should work right away, but on a single node
- To actually demo stateless app. Just change the localhost in memcache/memsess_withoutlock.php to another memcached host or Elasticache   

For DynamoDB - 

- Configure the  Access credentials in /usr/share/sdk-1.5.17/config.inc.php (copy from config-sample.inc.php)  
- Make sure you have dynamodb table created with  name 'sessions'  

KNOWN BUG -   
1. localhost for memcache is not passed through config.in and is manually configured right now. 

Warning -   
1. root is default user for connecting to mysql databases. Change it to something other than root.   
