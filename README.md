# Errbit integration for Kohana 3.3

## Installation

Use composer...

```json
require: {
    [...]
    "kwn/kohana-errbit": "dev-3.3/master"
}
```

...or clone repository to your ```/modules/``` directory

```
git clone git://github.com/kwn/kohana-errbit.git
```

and enable module in ```application/bootstrap.php```

```php
Kohana::modules(array(
    [...]
    'kohana-errbit'  => MODPATH.'kohana-errbit',
));
```

## Configuration

Copy ```/modules/kohana-errbit/config/errbit.php``` to ```/application/config/``` and fill config file with your settings. 

```php
return array(
    'api_key' => 'PUT YOUR ERRBIT API KEY HERE',
    'host'    => 'errbit.yourdomain.com',
    'port'    => 80,
    'min_env' => Kohana::DEVELOPMENT
);
```

Remember to change ```min_env``` to value lower than ```Kohana::DEVELOPMENT``` (ie. ```Kohana::STAGING```), to avoid Errbit requests during development.

Remember to set Kohana environment in your vhost:
```
<VirtualHost *:80>
    DocumentRoot /var/www/vhosts/com.application/httpdocs
    ServerName application.com
    
    SetEnv KOHANA_ENV PRODUCTION
</VirtualHost>
```

Of course you need to configure your Errbit, to handle requests from application.

## Ready!

This module registers Kohana Log driver, that handles Errbit notifications on exceptions, and registers error handlers:

```php
set_error_handler();
set_exception_handler();
register_shutdown_function();
```

This module uses ```emgiezet/errbitPHP``` vendor. Check <https://github.com/emgiezet/errbitPHP> for more information.
