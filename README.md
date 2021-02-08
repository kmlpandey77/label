# Laravel Label
A package for handling websites title and content dynamically.

### Installation
`composer require Kmlpandey77/label`

This package will be automatically register.

All you have to do is migrate the table by using `php artisan migrate` command from terminal.

Next you have to publish config file with:

`php artisan vendor:publish --provider="Kmlpandey77\Label\Provider\LabelServiceProvider" --tag="config"`

Now, You want to change view file.You can modify as your requirement using:

`php artisan vendor:publish --provider="Kmlpandey77\Label\Provider\LabelServiceProvider" --tag="views"`

### Usage
You can change your middleware and prefix as your own in `config/label.php`

```php
return [
    /*
    *for multiple language array
    */
    'lang' => [
        'en',
        //'np',
        //'fr'
    ],
    /*
    modify prefix here
    */
    'prefix' => 'admin',

    /*
    modify middleware here
    */
    'middleware' => ['web'],
];

```


