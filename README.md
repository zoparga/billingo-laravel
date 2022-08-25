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

# Partners

To get more information about this section, [please check this doc](./__docs/partners.md).


# TODO

Partners

- [ ] update
- [ ] delete

Products

- [ ] get all
- [ ] get one by id
- [ ] create
- [ ] update
- [ ] delete

Invoice (document)

- [ ] get all
- [ ] get one by id
- [ ] create final
- [ ] create invoice
- [ ] create receipt
- [ ] retrieve payment history
- [ ] update payment history
- [ ] print pos
- [ ] public pdf
- [ ] send in email
- [ ] delete
- [ ] payment delete


## Credits

- [zoparga](https://github.com/zoparga)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
