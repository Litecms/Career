This is a Litecms 5 package that provides career management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `litecms/career`.

    "litecms/career": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Litecms\Career\Providers\CareerServiceProvider::class,

```

And also add it to alias

```php
'Career'  => Litecms\Career\Facades\Career::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="view"

Public folders

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="public"

Publish admin views only if it is necessary.

## Usage


