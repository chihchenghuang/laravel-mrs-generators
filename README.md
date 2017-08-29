# [Laravel MRS Generators](https://packagist.org/packages/chihchenghuang/laravel-mrs-generators)

> This package is a experimental project that are inspired by [yish/generators](https://packagist.org/packages/yish/generators) which extends the core file generators based on Laravel 5

# Installation

Install by composer
```
    $ composer require chihchenghuang/laravel-mrs-generators
```

Registing Service Provider

``` php
<?php

//app.php

'providers' => [
        
        /*
         * Laravel MRS Generators Service Provider
         */
        \ChihCheng\MRSGenerators\GeneratorsServiceProvider::class,

    ],

```
or

``` php
<?php

//app/Providers/AppServiceProvider.php

    public function register()
    {
        if ($this->app->environment() == 'local')
        {
	        /*
	         * Laravel MRS Generators Service Provider
	         */
            $this->app->register( \ChihCheng\MRSGenerators\GeneratorsServiceProvider::class );

        }
    }

```

## Example

### Generate Repository:
>This command will generate a repository class.

```
    $ php artisan make:repository Repositories/TestRepository
```

### Generate Service:
>This command will generate a service class.

```
    $ php artisan make:repository Services/TestService
```

### Generate classes based on the corresponding Model-Repository-Service Pattern Set:
>This command will generate classes based on the corresponding Model-Repository-Service Pattern Set. The result will show as follows:
app/Models/Test.php
app/Repositories/TestRepository.php
app/Services/TestService.php

```
    $ php artisan make:mrs-model Test
```