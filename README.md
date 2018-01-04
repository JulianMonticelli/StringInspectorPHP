# StringInspectorPHP
A String Inspector written in PHP which is meant to dump information about a string.

By utilizing the .htaccess file RewriteEngine, we route any HTTP request as a string input to the PHP script. Then, the PHP script will (safely) parse the string input and dump some basic information. If the string is a number, some information about the number will be dumped. Also serves to dump out hashes of any string provided to it of a reasonable length.

It is **absolutely necessary** to have GMP math functions package installed and configured in your php.ini.

For linux users, it is as simple as 

```
yes | sudo apt-get install php-gmp
echo extension=php_gmp.so >> /etc/php/YOUR_PHP_VERSION/apache2/php.ini
```

It is also necessary to have set ```AllowOverride all``` of your .htaccess in a given directory.
