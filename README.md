# Prepare Laravel Project

## Configure newly created laravel project using simple package

- First We Need to install the package
```shell
composer require elattar/prepare
```
- Initialize the newly created project by pushing the helpers
- This Command will install the development packages that helps us like `laravel octane`, `laravel telescope`, `laravel ide-helper`, `laravel modules`, `fast paginate`, `laravel-backup` and `log-viewer`

- Run `composer update` and type `y`

```shell
php artisan elattar:initialize
```

- Then We have to publish package assets, files
```shell
php artisan vendor:publish --tag=elattar-prepare --force
```

- finally copy middlewares, files, dump composer
```shell
php artisan elattar:publish-prepare-files
```
