# SendPulse Laravel Helper

A service provider and facade to set up and use the [SendPulse](https://sendpulse.com/) PHP library in Laravel 5.

[![Build Status](https://travis-ci.org/garethtdavies/sendpulse-laravel.svg?branch=master)](https://travis-ci.org/garethtdavies/sendpulse-laravel)

This package consists of a service provider, which binds an instance of an initialized SendPulse client to the
IoC-container and a SendPulse facade so you may access all methods of the SendpulseApi class via the syntax:

```php
$message = ['title' => 'My first notification', 'website_id' => 1, 'body' => 'I am the body of the push message'];

SendPulse::createPushTask($message);
```

You should refer to the [SendPulse API](https://sendpulse.com/api) and underlying [SendPush PHP class](https://github.com/garethtdavies/sendpulse-rest-api-php) for full details about all
available methods.

## Setup

1. Install the 'wensleydale/sendpulse-laravel' package

    Note, this will also install the required wensleydale/sendpulse-rest-api-php package.

    ```shell
    $ composer require wensleydale/sendpulse-laravel:1.*
    ```

2. Update 'config/app.php'

    ```php
    # Add `SendPulseLaravelServiceProvider` to the `providers` array
    'providers' => array(
        ...
        'SendPulse\SendPulseLaravel\SendPulseLaravelServiceProvider',
    )

    # Add the `SendPushFacade` to the `aliases` array
    'aliases' => array(
        ...
        'SendPulse' => 'SendPulse\SendPulseLaravel\SendPulseFacade',
    )
    ```

3. Publish the configuration file (creates sendpulse.php in config directory) and add your API keys and optional default settings.

	```shell
    $ php artisan vendor:publish
    ```

### Type Hinting

If you do not wish to make use of the SendPulse facade you may simply "type-hint" the SendPulse dependency in the
constructor of a class that is resolved by the IoC container and an instantiated client will be ready for use.


```php
use SendPulse\SendpulseApi;

private $client;

public function __construct(SendpulseApi $client)
{
    $this->client = $client;
}

public function getWebsites()
{
	$this->client->pushListWebsites();
}
```
