# About the package

This is an API wrapper for [Billingo](https://billingo.hu)

# Installation
You can install the package via composer:

```composer require zoparga/billingo-laravel```

Publish config file

```php artisan vendor:publish --provider="zoparga\BillingoLaravel\BillingoLaravelServiceProvider" --tag="config"```

You get a new config file with the name of `billingo-laravel`.

Add your API key here, or you can extend you `.env` file:
```env
BILLINGO_API_KEY=""
BILLINGO_INVOICE_BLOCK_ID=""
BILLINGO_RECEIPT_BLOCK_ID=""
``` 

## Need to fill before live
- get API key
    - get here [https://app.billingo.hu/api-key](https://app.billingo.hu/api-key)
- get different "számlatömb", give API values to the config/env file
    - get here [https://app.billingo.hu/document-block/list](https://app.billingo.hu/document-block/list)


# Docs are low, but examples are full!

Please check the following docs folder under __docs.

# Examples

Please check the examples under _examples folder.

# Variables, to use

Please check the examples under __docs/variables_to_use folder.

# TODO

Invoice (document)

- [ ] cancel document
- [ ] save sent data to local database
- [ ] interval check, to keep sync Billingo & local db data
- [ ] proper logging


## Credits

- [zoparga](https://github.com/zoparga)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
