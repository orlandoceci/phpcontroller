# PHP CONTROLLER

This is a library to implement continuous loop scripts, useful to develop SMART applications, using PHP language.


## MQTT support

Thanks to the library Mosquitto-PHP (https://github.com/mgdm/Mosquitto-PHP) it's possible to achieve a very high data transfer performance.


## Requirements

* Linux OS
* A webserver implemented (Apache, Nginx, Lighttpd, ...)
* PHP 5.3+


## Installation

Copy all folders and files of the package into the main path of your webserver (usually the result is /var/www/html/phpcontroller).
Set the following privileges:

````
sudo chmod 755 -R /var/www/html/phpcontroller
sudo chown -R www-data:www-data /var/html/phpcontroller
````

Read more info on the [official web site](https://phpcontroller.org/index.php?module=tipTricks) to configure an MQTT communication and discover all tip&tricks of Php Controller.


## Documentation

Full documentation is available [online](https://phpcontroller.org/index.php?module=configuration).


## Contacts

For more info or any issue don't hesitate to contact me by mail: orlando.ceci@phpcontroller.org.
