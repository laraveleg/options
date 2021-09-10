# laravel options

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/laraveleg/options.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/laraveleg/options.svg?style=flat-square)](https://packagist.org/packages/laraveleg/options)

You can create options, reuse them and rely on them at a later time. Inspired by the [WordPress](https://codex.wordpress.org/Options_API) system and built on the `Laravel` framework.

## Install for laravel

```bash
composer require laraveleg/options
```

## Install for lumen
```bash
composer require laraveleg/options
```

### Register service provider
Go to `bootstrap/app.php` file and add the following line
```php
$app->register(LaravelEG\LaravelOptions\LumenOptionsServiceProvider::class);
```

### Migrate options table
```bash
php artisan migrate
```


## Usage

You can manage options in a simple way by helpers.

## Cache Mode

### add_option
You can add an option through the following line :-
```php
add_option($key, $value, $expiration);
```
`$key`: The option ID that you will use to fetch its value.

`$value`: Put the value of any type of data.

`$expiration`: Expiration date. This can be unused and saved all the time. Ex: `add_option($key, $value)`.

### get_option
Fetching value for a specific option :-
```php
get_option($key, $default)
```
`$key`: The option ID.
`$default`: You can specify a default value if the option is not found.

### has_option
Make sure the option is there :-
```php
has_option($key)
```
`$key`: The option ID.

### remove_option
You can delete any option :-
```php
remove_option($key)
```
`$key`: The option ID.

---

## Eloquent Mode
You can put the settings to a specific element in a specific model.

### Vendor publish
```bash
php artisan vendor:publish --provider="LaravelEG\LaravelOptions\LaravelOptionsServiceProvider"
```
#### Migrate options table
```bash
php artisan migrate
```

### Set config
Go to `laraveloptions.php` file in configs directory
```php
'eloquent_mode' => true, // Enable Eloquent Mode
```

### Use for model
Add the trait in your specific model.

```php
use LaravelEG\LaravelOptions\Traits\HasLaravelEGOptions;

class Unit extends Model
{
    use HasLaravelEGOptions;
```

### add_option
You can add an option through the following line :-
```php
$unit = Unit::find(1);
$unit->addOption($key, $value, $expiration);
```
`$key`: The option ID that you will use to fetch its value.

`$value`: Put the value of any type of data.

`$expiration`: Expiration date. This can be unused and saved all the time. Ex: `add_option($key, $value)`.

### get_option
Fetching value for a specific option :-
```php
$unit = Unit::find(1);
$unit->getOption($key, $default)
```
`$key`: The option ID.
`$default`: You can specify a default value if the option is not found.

### has_option
Make sure the option is there :-
```php
$unit = Unit::find(1);
$unit->hasOption($key)
```
`$key`: The option ID.

### remove_option
You can delete any option :-
```php
$unit = Unit::find(1);
$unit->removeOption($key)
```
`$key`: The option ID.

> You an use this `Trait` in any model on your app.

## Command-lines

### Remove all options
```bash
php artisan laraveleg:options:remove-all
```
Remove all options on eloquent mode

## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Security

If you discover any security-related issues, please email komicho1996@gmail.com instead of using the issue tracker.


## License

The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.