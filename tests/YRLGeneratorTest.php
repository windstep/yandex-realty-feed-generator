<?php

namespace Test;

use Windstep\YRLGenerator\Offer;
use Windstep\YRLGenerator\YRLGenerator;

class YRLGeneratorTest extends TestCase
{
    /** @test */
    public function test_yrl_generator_creates_valid_file()
    {
        $validFilePath = __DIR__ . '/files/valid_file.xml';
        $outputFilePath = __DIR__ . '/files/created_file.xml';
        $temporaryFilePath = __DIR__ . '/files/tmp_file.xml';

        $generator = new YRLGenerator($outputFilePath, $temporaryFilePath, 2);
        $generator->beforeWrite('2015-04-11T12:00:00+04:00');
        $offer = new Offer(15782295, [
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
            'description' => 'Продается 2 к. кв., 13 этаж, 15 минут на машине до метро "Василеостровская". Дом комфорт-класса с продуманными планировочными решениями и широким выбором квартир. Внутренний двор «Северной фантазии» выполнен по эксклюзивному дизайн-проекту. В районе постройки нового ЖК развита инфраструктура: школы и детские сады, больница, аптеки магазины, кафе и спортивные центры. Доступны разные условия ипотеки, скидки и зачет жилья.',
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

        ]);
        $generator->bulkWrite($offer);
        $generator->afterWrite();

        $this->assertXmlFileEqualsXmlFile($validFilePath, $outputFilePath);
    }
}
