# laravel-options

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/foxlaby/laravel-options.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/foxlaby/laravel-options.svg?style=flat-square)](https://packagist.org/packages/foxlaby/laravel-options)

You can create options, reuse them and rely on them at a later time. Inspired by the [WordPress](https://codex.wordpress.org/Options_API) system and built on the `Laravel` framework.

## Install

```bash
composer require foxlaby/laravel-options
```


## Usage

You can manage options in a simple way by helpers.

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