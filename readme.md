Laravel package that provides career management facility for the lavalite cms.

## Installation

Begin by installing this package through Composer.


    composer require litecms/career


## Migration and seeds

    php artisan migrate
    php artisan db:seed --class=Litecms\\CareerTableSeeder

## Publishing files

**Configuration**

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="config"

**Language**

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="lang"


### Views

Publishes views to resources/vendor

    php artisan vendor:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --tag="view"


Publishes admin view to admin theme

    php artisan theme:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --view="admin" --theme="admin"


Publishes public view

    php artisan theme:publish --provider="Litecms\Career\Providers\CareerServiceProvider" --view="public" --theme="public"