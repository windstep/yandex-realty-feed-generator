<?php

namespace Windstep\YRLGenerator;

use Windstep\YRLGenerator\Enums\BalconyType;
use Windstep\YRLGenerator\Enums\BathroomUnit;
use Windstep\YRLGenerator\Enums\Category;
use Windstep\YRLGenerator\Enums\Currency;
use Windstep\YRLGenerator\Enums\DealStatus;
use Windstep\YRLGenerator\Enums\FloorCovering;
use Windstep\YRLGenerator\Enums\PropertyType;
use Windstep\YRLGenerator\Enums\Renovation;
use Windstep\YRLGenerator\Enums\RoomType;
use Windstep\YRLGenerator\Enums\SalesAgentCategory;
use Windstep\YRLGenerator\Enums\Type;
use Windstep\YRLGenerator\Enums\Unit;
use Windstep\YRLGenerator\Enums\WindowType;
use Windstep\YRLGenerator\Traits\FiltersArray;

class Offer extends AbstractOffer
{
    use FiltersArray;

    protected $id;
    protected $type;
    protected $propertyType;
    protected $category;
    protected $dealStatus;
    protected $price;

    protected $location;
    protected $metro = [];
    protected $salesAgent;

    protected $url;
    protected $creationDate;

    protected $images = [];
    protected $area;
    protected $livingSpace;
    protected $roomSpace;
    protected $kitchenSpace;
    protected $renovation;
    protected $description;

    protected $newFlat;
    protected $floor;
    protected $rooms;
    protected $roomsType;
    protected $apartments;
    protected $studio;
    protected $openPlan;
    protected $balcony;
    protected $windowView;
    protected $bathroomUnit;
    protected $floorCovering;

    public function setFloorCovering(FloorCovering $floorCovering)
    {
        $this->floorCovering = $floorCovering->getValue();
        return $this;
    }


    public function setNewFlat()
    {
        $this->newFlat = true;
        return $this;
    }

    public function setFloor(int $floor)
    {
        $this->floor = $floor;
        return $this;
    }

    public function setRooms(int $rooms)
    {
        $this->rooms = $rooms;
        return $this;
    }

    public function setRoomsType(RoomType $roomsType)
    {
        $this->roomsType = $roomsType;
        return $this;
    }

    public function setApartments()
    {
        $this->apartments = true;
        return $this;
    }

    public function setStudio()
    {
        $this->studio = true;
        return $this;
    }

    public function setOpenPlan()
    {
        $this->openPlan = true;
        return $this;
    }

    public function setBalcony(BalconyType $balcony, ?int $amount = 1)
    {
        $balcony = $balcony->getValue();
        if ($amount > 1) {
            $balcony = $amount . ' ' . $balcony;
        }
        $this->balcony = $balcony;
        return $this;
    }

    public function setWindowView(WindowType $windowView)
    {
        $this->windowView = $windowView->getValue();
        return $this;
    }

    public function setBathroomUnit(BathroomUnit $bathroomUnit, ?int $count = null)
    {
        if ($count) {
            $this->bathroomUnit = $count;
        }else {
            $this->bathroomUnit = $bathroomUnit->getValue();
        }
        return $this;
    }

    public function setImage(string $imgUrl)
    {
        $this->images[] = $imgUrl;
        return $this;
    }

    public function setArea($value, Unit $unit)
    {
        $this->area = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setLivingSpace($value, Unit $unit)
    {
        $this->livingSpace = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setRoomSpace($value, Unit $unit)
    {
        $this->roomSpace[] = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setKitchenSpace($value, Unit $unit)
    {
        $this->kitchenSpace = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setRenovation(Renovation $renovation)
    {
        $this->renovation = $renovation;
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setDealStatus(DealStatus $dealStatus)
    {
        $this->dealStatus = $dealStatus->getValue();
        return $this;
    }

    public function setPrice($value, Currency $currency, ?Unit $unit = null)
    {
        $this->price = [
            'value' => $value,
            'currency' => $currency->getValue(),
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    public function setSalesAgent(
        ?string $name,
        string $phone,
        SalesAgentCategory $category,
        ?string $organization = null,
        ?string $url = null,
        ?string $email = null,
        ?string $photo = null
    ) {
        $this->salesAgent = [
            'name' => $name,
            'phone' => $phone,
            'category' => $category->getValue(),
            'organization' => $organization,
            'url' => $url,
            'email' => $email,
            'photo' => $photo
        ];
        return $this;
    }

    public function setLocation(
        string $country,
        ?string $region = null,
        ?string $district = null,
        ?string $localityName = null,
        ?string $subLocalityName = null,
        ?string $address = null,
        ?string $direction = null,
        ?string $distance = null,
        ?string $latitude = null,
        ?string $longitude = null
    ) {
        $this->location = [
            'country' => $country,
            'region' => $region,
            'district' => $district,
            'locality-name' => $localityName,
            'sub-locality-name' => $subLocalityName,
            'address' => $address,
            'direction' => $direction,
            'distance' => $distance,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
        return $this;
    }

    public function setMetro(string $name, ?string $timeOnFoot, ?string $timeOnTransport)
    {
        $this->metro[] = [
            'name' => $name,
            'time-on-foot' => $timeOnFoot,
            'time-on-transport' => $timeOnTransport
        ];
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setType(Type $type): self
    {
        $this->type = $type->getValue();
        return $this;
    }

    public function setPropertyType(PropertyType $propertyType)
    {
        $this->propertyType = $propertyType->getValue();
        return $this;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category->getValue();
        return $this;
    }
}
