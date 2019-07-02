# Magento 2 module example

## About
Hi there! This is a Working In Progress project.

The premise behind this repository is a Magento 2 module, to retrieve information from [The Movie Database](themoviedb.org), display the content into a list format and allow user to add the movie as a Product.

## What was made
Currently I've finished the Module configuration, movies search and exhibition. Also the TMDb API request.

## To Do
It's necessary to start the implementation of saving movies as products, add some code coverage and a Docker image to allow easily tests.

I have plans to serve this module as a package at [packagist](https://packagist.org) too.

## How to install
From now, the only way to install it is editing your `composer.json` to use the package through github repository.
```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/henriqueramos/magento2-plugin-example"
        }
    ],
    "require": {
        "ramoshenrique/magento-two-tmdb-module": "~1.0.0"
    }
}
```

After that, run `composer install`, after the complete installation proceed with the Module Configuration at Magento Admin Panel.

## Configuration

Proceed to `Stores` > `Configuration` > tab `TMDB`, mark the `Module enable` as `Yes` and insert your TMDb API Key.

Note: You can retrieve one from [here](https://developers.themoviedb.org/3/getting-started/introduction).

After configurated, you can access the interface through `Catalog` > `Search Movies`.

Fill any text into the input and press the button.

I hope you can see this Magento 2 Module as helpful in your studies