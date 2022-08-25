# Partners


## Create a Partner

The following fields are required:
- name
- country
- post_code
- city
- address


## Create Partner

```php
// AUTOLOAD WITH THE FOLLOWING LINE
use zoparga\BillingoLaravel\BillingoPartners;
```

```php

$data = [
    'name' => 'Company name Ltd.',
    'country_code' => 'HU',
    'post_code' => 1024,
    'city' => 'Budapest',
    'address' => 'Fő utca 40.',
];

$response = BillingoPartners::prepare()->partnerData($data)->create();
```

## Get all partners

```php 
$response = BillingoPartners::prepare()->getAll();
```

## Get One partner by Billingo Partner Id

```php
$billingoPartnerId = 1754130525;

$response = BillingoPartners::prepare()->getOne($billingoPartnerId);
```
