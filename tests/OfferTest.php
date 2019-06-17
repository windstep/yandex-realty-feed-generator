<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Windstep\YRLGenerator\Enums\BalconyType;
use Windstep\YRLGenerator\Enums\BathroomUnit;
use Windstep\YRLGenerator\Enums\BuildingState;
use Windstep\YRLGenerator\Enums\Category;
use Windstep\YRLGenerator\Enums\Currency;
use Windstep\YRLGenerator\Enums\PropertyType;
use Windstep\YRLGenerator\Enums\SalesAgentCategory;
use Windstep\YRLGenerator\Enums\Type;
use Windstep\YRLGenerator\Enums\Unit;
use Windstep\YRLGenerator\Offer;

class OfferTest extends TestCase
{
    /** @test */
    public function offer_creatable_by_constructor()
    {
        $offer = new Offer(123456, [
            'type' => 'продажа',
            'property-type' => 'жилая',
            'category' => 'квартира',
            'creation-date' => '2015-04-02T19:00:06+03:00',
            'location' => [
                'country' => 'Россия',
                'locality-name' => 'Санкт-Петербург',
                'address' => '18-я линия В.О., 32',
                'metro' => [
                    [
                        'name' => 'Василеостровская'
                    ]
                ],
            ],
            'price' => [
                'value' => 4780000,
                'currency' => 'RUB',
            ],
            'sales-agent' => [
                'phone' => '+7812500400',
                'organization' => 'ЗАО "Застройщик"',
                'url' => 'http://www.developer.ru/',
                'category' => 'застройщик',
                'photo' => 'http://www.developer.ru/company/logo',
            ],
            'rooms' => 2,
            'new-flat' => true,
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
        $expectedArray = $this->getOriginalArray();
        $this->assertSame($expectedArray, $offer->toArray());
    }

    private function getOriginalArray()
    {
        return [
            'type' => 'продажа',
            'property-type' => 'жилая',
            'category' => 'квартира',
            'creation-date' => '2015-04-02T19:00:06+03:00',
            'location' => [
                'country' => 'Россия',
                'locality-name' => 'Санкт-Петербург',
                'address' => '18-я линия В.О., 32',
                'metro' => [
                    [
                        'name' => 'Василеостровская'
                    ]
                ],
            ],
            'price' => [
                'value' => 4780000,
                'currency' => 'RUB',
            ],
            'sales-agent' => [
                'phone' => '+7812500400',
                'organization' => 'ЗАО "Застройщик"',
                'url' => 'http://www.developer.ru/',
                'category' => 'застройщик',
                'photo' => 'http://www.developer.ru/company/logo',
            ],
            'rooms' => 2,
            'new-flat' => true,
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

        ];
    }

    /** @test */
    public function offer_creatable_by_fluent_setters()
    {
        $offer = new Offer(123456);
        $offer->setType(Type::SELL())
            ->setPropertyType(PropertyType::LIVING())
            ->setCategory(Category::FLAT())
            ->setLocation('Россия', null, null, 'Санкт-Петербург', null, '18-я линия В.О., 32')
            ->setMetro('Василеостровская')
            ->setPrice(4780000, Currency::RUB())
            ->setSalesAgent(null,
                '+7812500400',
                SalesAgentCategory::DEVELOPER(),
                'ЗАО "Застройщик"',
                'http://www.developer.ru/',
                null,
                'http://www.developer.ru/company/logo'
            )
            ->setRooms(2)
            ->setNewFlat()
            ->setBathroomUnit(BathroomUnit::SEPARATED())
            ->setBalcony(BalconyType::BALCONY())
            ->setFloor(13)
            ->setFloorsTotal(15)
            ->setBuildingName('Северная фантазия')
            ->setYandexBuildingId(12345)
            ->setYandexHouseId(54321)
            ->setBuildingSection('Корпус 1')
            ->setBuildingState(BuildingState::UNFINISHED())
            ->setReadyQuarter(3)
            ->setBuiltYear(2018)
            ->setBuildingPhase(3)
            ->setImage('http://www.developer.ru/images/plans/000001289.jpg')
            ->setDescription('Продается 2 к. кв., 13 этаж, 15 минут на машине до метро "Василеостровская". Дом комфорт-класса с продуманными планировочными решениями и широким выбором квартир. Внутренний двор «Северной фантазии» выполнен по эксклюзивному дизайн-проекту. В районе постройки нового ЖК развита инфраструктура: школы и детские сады, больница, аптеки магазины, кафе и спортивные центры. Доступны разные условия ипотеки, скидки и зачет жилья.')
            ->setArea(63.00, Unit::METER_SQUARE())
            ->setLivingSpace(50.00, Unit::METER_SQUARE())
            ->setKitchenSpace(10.00, Unit::METER_SQUARE())
            ->setRoomSpace(15, Unit::METER_SQUARE())
            ->setRoomSpace(35, Unit::METER_SQUARE())
            ->setCreationDate('2015-04-02T19:00:06+03:00');
        $expectedArray = $this->getOriginalArray();
        $this->assertSame($expectedArray, $offer->toArray());
    }
}
