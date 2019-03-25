# Laravel React
React for Laravel

## Install

Via Composer

``` bash
$ composer require morningtrain/laravel-react
```

## Usage

#### View

In your controller:
``` php
return view('your_view')->with([
    'component' => 'Welcome',
    'props'     => [
        'title' => 'From controller',
    ],
    'options'   => [],
]);
```

And in your view:
``` php
@react()
```

Or straight from view:
``` php
@react([
    'component' => 'Welcome',
    'props' => [
        'title' => 'From view',
    ],
    'options' => [],
])
```

## Credits

- [Morning Train](https://morningtrain.dk/)
