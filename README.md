# Prepare Laravel Project

## Configure newly created laravel project using simple package

- First We Need to install the package
```shell
composer require elattar/prepare
```
- Run `composer update` and type `y`
```shell
composer update
```
- Initialize the newly created project by pushing the helpers
- This Command will install the development packages that helps us like `laravel telescope`, `laravel modules`, `fast paginate`, `commitlint` and `husky`

```shell
php artisan elattar:initialize
```

- if you don't want to install `commitlint` package to lint you git commits, you can pass `--no-commitlint` flag
```shell
php artisan elattar:initialize --no-commitlint
```

- To install advanced packages like `log-viewer` you can pass `--advanced` flag
```shell
php artisan elattar:initialize --advanced
```

- Then We have to publish package assets, files
```shell
php artisan vendor:publish --tag=elattar-prepare --force
```

- finally copy middlewares, files, dump composer
```shell
php artisan elattar:publish-prepare-files
```
