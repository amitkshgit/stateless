MAKE SURE YOU SET ALL PARAMETERS PROPERLY IN config.inc

ALSO MAKE SURE THAT file.sql IS EXECUTED AGAINST A RUNNING MYSQL DATABASE. THIS CREATES THE ENTIRE SCHEMA.
MAKE SURE YOU SET ALL PARAMETERS PROPERLY IN config.inc

ALSO MAKE SURE THAT file.sql IS EXECUTED AGAINST A RUNNING MYSQL DATABASE. THIS CREATES THE ENTIRE SCHEMA.
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
