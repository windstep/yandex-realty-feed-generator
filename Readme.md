## Yandex Realty Language (YRL) files generator

YRLGenerator is a simple php library, which provides clean way to create files, which are used to work with yandex realty service.
It is based on YRL syntax and is fully valid.

## Installation

To install, simply type in your terminal following command:

`composer require windstep/yandex-realty-feed-generator`

And make sure, that php version >= 7.3 and ext-xmlwriter is installed and enabled in your system

## How to use it

The main workflow is the following:

```php

use Windstep\YRLGenerator\YRLGenerator;
use Windstep\YRLGenerator\Offer;

$validFilePath = __DIR__ . '/files/valid_file.xml';
$outputFilePath = __DIR__ . '/files/created_file.xml';
$temporaryFilePath = __DIR__ . '/files/tmp_file.xml';

$generator = new YRLGenerator($validFilePath, $outputFilePath, $temporaryFilePath); // Note, that last one could be null
$generator->beforeWrite();
$offers = [new Offer(1, $data), new Offer(2, $data)]; // Offer keys (first value) must be unique
foreach ($offers as $offer) {
    $generator->bulkWrite($offer);
}
$generator->afterWrite();

```

## How data must be added

To work with data, you must know, that there are three types of data presented.

* Simple data, which is presented like $key => $value and will be converted to <$key>$value</$key>
* Array data $key => $childKey => $value, which will be converted to <$key><$childKey>$value</$childKey></$key> 
* Special data, like image array, which will be converted by special functions

So, you must create array like following:

```php
    $data = [
        'type' => 'продажа',
        'property-type' => 'жилая',
        'category' => 'квартира',
        'creation-date' => '2015-04-02T19:00:06+03:00',
        'location' => [
            'country' => 'Россия',
            'locality-name' => 'Санкт-Петербург',
            'address' => '18-я линия В.О., 32',
            'metro' => [
                'name' => 'Василеостровская'
            ],
        ],
        'price' => [
            'value' => 4780000,
            'currency' => 'RUR',
        ],
        'sales-agent' => [
            'phone' => '+7812500400',
            'organization' => 'ЗАО "Застройщик"',
            'url' => 'http://www.developer.ru/',
            'category' => 'developer',
            'photo' => 'http://www.developer.ru/company/logo',
        ],
        'rooms' => 2,
        'new-flat' => 1,
        'bathroom-unit' => 'раздельный',
        'balcony' => 'балкон',
        'floor' => 13,
        'floors-total' => 15,
        'building-name' => 'Северная фантазия',
        'yandex-building-id' => 12345,
        'yandex-house-id' => 54321,
        'building-section' => 'Корпус 1',
        'building-state' => 'unfinished',
        'ready-quarter' => 3,
        'built-year' => 2018,
        'building-phase' => 3,
        'image' => [
            'http://www.developer.ru/images/plans/000001289.jpg',
        ],
        'description' => 'Продается 2 к. кв., 13 этаж, 15 минут на машине до метро "Василеостровская". 
                        Дом комфорт-класса с продуманными планировочными решениями и широким выбором квартир. 
                        Внутренний двор «Северной фантазии» выполнен по эксклюзивному дизайн-проекту. 
                        В районе постройки нового ЖК развита инфраструктура: школы и детские сады, больница, аптеки,
                        магазины, кафе и спортивные центры. Доступны разные условия ипотеки, скидки и зачет жилья.', // No html tags available here
        'area' => [
            'value' => 63.00,
            'unit' => 'кв. м',
        ],
        'living-space' => [
            'value' => 50.00,
            'unit' => 'кв. м',
        ],
        'kitchen-space' => [
            'value' => 10.00,
            'unit' => 'кв. м',
        ],
        'room-space' => [
            [
                'value' => 15,
                'unit' => 'кв. м',
            ],
            [
                'value' => 35,
                'unit' => 'кв. м',
            ]
        ],

    ]

```
