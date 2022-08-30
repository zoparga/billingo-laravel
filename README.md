# About the package

This is an API wrapper for [Billingo](https://billingo.hu)

# Installation
You can install the package via composer:

```composer require zoparga/billingo-laravel```

Publish config file

```php artisan vendor:publish --provider="zoparga\BillingoLaravel\BillingoLaravelServiceProvider" --tag="config"```

You get a new config file with the name of `billingo-laravel`.

Add your API key here, or you can extend you `.env` file:
```json
BILLINGO_API_KEY=
``` 

# Docs

Please check the following docs folder under __docs.

# Examples

Please check the examples under _examples folder.

# Variables, to use

Please check the examples under __docs/variables_to_use folder.

# TODO


Invoice (document)


// 
- [ ] create final
- [ ] create invoice
- [ ] create receipt
//
- [ ] print pos
- [ ] public pdf


Bank Account

 - [ ] get all
 - [ ] get one
 - [ ] get create
 - [ ] get update
 - [ ] get delete


## Credits

- [zoparga](https://github.com/zoparga)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
