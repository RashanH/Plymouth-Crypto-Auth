
![CryptFence Logo](https://github.com/RashanH/Plymouth-Crypto-Auth/raw/main/public/images/logo/logo_01.png "CryptFence Logo")

## Cloud Based License Management System

The “Crypt Fence” platform will provide most perfect solution for this software licensing problem. It is a cloud-based web application, which creates, store, and validate dynamic licenses. The system is highly secured using cryptographic algorithms. The software developers are allowed to register on platform and use the “Crypt Fence” licensing service in their custom applications.

------------

#### SetUp Guide
This section will guide you to setup license server on your own server. 

##### System requirements:
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- GIT & Composer 

------------

##### Installation:

###### Step 1:
Copy the submitted source file to a directory and unzip it.
###### Step 2:
Update vendor files. Make sure to provide your Laravel Spark authentication key while installing it.
$ composer update
###### Step 3:
Update NPM files:
$ npm install
$ npn run dev
###### Step 4:
Run database migrations.
php artisan migrate
###### Step 5:
Update environment file (.env).
CASHIER_CURRENCY=USD
CASHIER_CURRENCY_LOCALE=en
STRIPE_KEY=pk_test_example
STRIPE_SECRET=sk_test_example
###### Step 6:
Update config/Spart.php file with Stripe’s subscription and packages.
###### Step 7:
Start the server using,
$ php artisan serve
The web platform will start on 127.0.0.1:8000. There is no default user and you will have to create a new user via http://127.0.0.1:8000/register.

------------

##### Usage:
•	Log into web platform using http://127.0.0.1:8000/login and setup products.
•	The full API documentation will be available for you at http://127.0.0.1/documentation. 
