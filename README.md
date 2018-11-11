# Example fot RSA with PHPsecLib and codeigniter

A simple codeigniter implementation with PHPSeclib for RSA Asymetric encryption

UPDATE: Imported the [jsencrypt](https://github.com/travist/jsencrypt) library to enable encryption in the client and decryption in the server side

## Installation

Clone the repository

```
git clone https://github.com/thblckjkr/codeigniter-RSA.git
```

Install composer, for the phpseclib management. It can be easely done with

```
curl -s http://getcomposer.org/installer | php
./composer.phar install
```

Maybe you'll need to enable the headers for the keys management

```
sudo a2enmod headers
```

## Work

The example it's a program working. But if you want, wipe out all controllers, models, and views and start from 0. The Library RSATool it's just an interface. Hope you'll find usefull