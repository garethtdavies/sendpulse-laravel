# SendPulse Laravel Helper

A service provider and facade to set up and use the SendPulse PHP library in Laravel 5.

## Setup

1. Install the 'wensleydale/sendpulse-laravel' package

    Note, this will also install the required wensleydale/sendpulse-rest-api-php package.

    ```shell
    $ composer require wensleydale/sendpulse-laravel:1.*
    ```

2. Update 'config/app.php'

    ```php
    # Add `SendPushLaravelServiceProvider` to the `providers` array
    'providers' => array(
        ...
        'Wensleydale\SendPulseLaravel\SendPushLaravelServiceProvider',
    )

    # Add the `SendPushFacade` to the `aliases` array
    'aliases' => array(
        ...
        'SendPush' => 'Wensleydale\SendPulseLaravel\SendPushFacade',
    )
    ```

3. Publish the configuration file (creates sendpulse.php in config directory) and add your API keys and optional default settings.

	```shell
    $ php artisan vendor:publish
    ```