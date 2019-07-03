<?php

namespace Windstep\YRLGenerator;

use Windstep\YRLGenerator\Enums\BalconyType;
use Windstep\YRLGenerator\Enums\BathroomUnit;
use Windstep\YRLGenerator\Enums\BuildingState;
use Windstep\YRLGenerator\Enums\BuildingType;
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

class Offer extends AbstractOffer
{
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

    protected $floorsTotal;
    protected $buildingName;
    protected $yandexBuildingId;
    protected $yandexHouseId;
    protected $buildingState;
    protected $builtYear;
    protected $readyQuarter;
    protected $buildingPhase;
    protected $buildingType;
    protected $buildingSeries;
    protected $buildingSection;
    protected $ceilingHight;
    protected $lift;
    protected $rubbishChute;
    protected $guardedBuilding;
    protected $parking;
    protected $isElite;

    public function setFloorsTotal(?int $floorsTotal): Offer
    {
        $this->floorsTotal = $floorsTotal;
        return $this;
    }

    public function setBuildingName(?string $buildingName): Offer
    {
        $this->buildingName = $buildingName;
        return $this;
    }

    public function setYandexBuildingId($yandexBuildingId): Offer
    {
        $this->yandexBuildingId = $yandexBuildingId;
        return $this;
    }

    public function setYandexHouseId($yandexHouseId): Offer
    {
        $this->yandexHouseId = $yandexHouseId;
        return $this;
    }

    public function setBuildingState(BuildingState $buildingState): Offer
    {
        $this->buildingState = $buildingState->getValue();
        return $this;
    }

    public function setBuiltYear(?int $builtYear): Offer
    {
        $this->builtYear = $builtYear;
        return $this;
    }

    public function setReadyQuarter(?int $readyQuarter): Offer
    {
        $this->readyQuarter = $readyQuarter;
        return $this;
    }

    public function setBuildingPhase($buildingPhase): Offer
    {
        $this->buildingPhase = $buildingPhase;
        return $this;
    }

    public function setBuildingType(BuildingType $buildingType): Offer
    {
        $this->buildingType = $buildingType->getValue();
        return $this;
    }

    public function setBuildingSeries(?int $buildingSeries): Offer
    {
        $this->buildingSeries = $buildingSeries;
        return $this;
    }

    public function setBuildingSection($buildingSection): Offer
    {
        $this->buildingSection = $buildingSection;
        return $this;
    }

    public function setCeilingHight(?int $ceilingHight): Offer
    {
        $this->ceilingHight = $ceilingHight;
        return $this;
    }

    public function setLift(bool $lift): Offer
    {
        $this->lift = $lift;
        return $this;
    }

    public function setRubbishChute(bool $rubbishChute): Offer
    {
        $this->rubbishChute = $rubbishChute;
        return $this;
    }

    public function setGuardedBuilding(bool $guardedBuilding): Offer
    {
        $this->guardedBuilding = $guardedBuilding;
        return $this;
    }

    public function setParking(bool $parking): Offer
    {
        $this->parking = $parking;
        return $this;
    }

    public function setIsElite(bool $isElite): Offer
    {
        $this->isElite = $isElite;
        return $this;
    }

    public function setFloorCovering(FloorCovering $floorCovering): Offer
    {
        $this->floorCovering = $floorCovering->getValue();
        return $this;
    }


    public function setNewFlat(): Offer
    {
        $this->newFlat = true;
        return $this;
    }

    public function setFloor(?int $floor): Offer
    {
        $this->floor = $floor;
        return $this;
    }

    public function setRooms(?int $rooms): Offer
    {
        $this->rooms = $rooms;
        return $this;
    }

    public function setRoomsType(RoomType $roomsType): Offer
    {
        $this->roomsType = $roomsType;
        return $this;
    }

    public function setApartments(): Offer
    {
        $this->apartments = true;
        return $this;
    }

    public function setStudio(): Offer
    {
        $this->studio = true;
        return $this;
    }

    public function setOpenPlan(): Offer
    {
        $this->openPlan = true;
        return $this;
    }

    public function setBalcony(BalconyType $balcony, ?int $amount = 1): Offer
    {
        $balcony = $balcony->getValue();
        if ($amount > 1) {
            $balcony = $amount . ' ' . $balcony;
        }
        $this->balcony = $balcony;
        return $this;
    }

    public function setWindowView(WindowType $windowView): Offer
    {
        $this->windowView = $windowView->getValue();
        return $this;
    }

    public function setBathroomUnit(BathroomUnit $bathroomUnit, ?int $count = null): Offer
    {
        if ($count) {
            $this->bathroomUnit = $count;
        } else {
            $this->bathroomUnit = $bathroomUnit->getValue();
        }
        return $this;
    }

    public function setImage(?string $imgUrl): Offer
    {
        $this->images[] = $imgUrl;
        return $this;
    }

    public function setArea($value, Unit $unit): Offer
    {
        $this->area = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setLivingSpace($value, Unit $unit): Offer
    {
        if (!$value) {
            return $this;
        }

        $this->livingSpace = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setRoomSpace($value, Unit $unit): Offer
    {
        $this->roomSpace[] = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setKitchenSpace($value, Unit $unit): Offer
    {
        $this->kitchenSpace = [
            'value' => $value,
            'unit' => $unit->getValue()
        ];
        return $this;
    }

    public function setRenovation(Renovation $renovation): Offer
    {
        $this->renovation = $renovation;
        return $this;
    }

    public function setDescription(?string $description): Offer
    {
        $this->description = $description;
        return $this;
    }

    public function setDealStatus(DealStatus $dealStatus): Offer
    {
        $this->dealStatus = $dealStatus->getValue();
        return $this;
    }

    public function setPrice($value, Currency $currency, ?Unit $unit = null): Offer
    {
        $this->price = [
            'value' => $value,
            'currency' => $currency->getValue(),
            'unit' => $unit ? $unit->getValue() : null
        ];
        return $this;
    }

    public function setUrl(?string $url): Offer
    {
        $this->url = $url;
        return $this;
    }

    public function setCreationDate($creationDate): Offer
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
    ): Offer {
        $this->salesAgent = [
            'name' => $name,
            'phone' => $phone,
            'organization' => $organization,
            'url' => $url,
            'category' => $category->getValue(),
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
    ): Offer {
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

    public function setMetro(string $name, ?string $timeOnFoot = null, ?string $timeOnTransport = null): Offer
    {
        $this->metro[] = [
            'name' => $name,
            'time-on-foot' => $timeOnFoot,
            'time-on-transport' => $timeOnTransport
        ];
        return $this;
    }

    public function setId($id): Offer
    {
        $this->id = $id;
        return $this;
    }

    public function setType(Type $type): Offer
    {
        $this->type = $type->getValue();
        return $this;
    }

    public function setPropertyType(PropertyType $propertyType): Offer
    {
        $this->propertyType = $propertyType->getValue();
        return $this;
    }

    public function setCategory(Category $category): Offer
    {
        $this->category = $category->getValue();
        return $this;
    }

    public function toArray()
    {
        $this->prepareSelf();
        return $this->properties;
    }

    protected function prepareSelf()
    {
        $this->properties = $this->filterArray($this->properties);
        $mergingArray = $this->filterArray($this->attributesToArray());
        $this->properties = array_merge_recursive($this->properties, $mergingArray);
    }

    public function attributesToArray()
    {
        if (!isset($this->location)) {
            $this->location = [];
        }
        return [
            'type' => $this->type,
            'property-type' => $this->propertyType,
            'category' => $this->category,
            'deal-status' => $this->dealStatus,
            'url' => $this->url,
            'creation-date' => $this->creationDate,
            'location' => array_merge($this->location, ['metro' => $this->metro]),
            'price' => $this->price,
            'sales-agent' => $this->salesAgent,
            'rooms' => $this->rooms,
            'new-flat' => $this->newFlat,
            'bathroom-unit' => $this->bathroomUnit,
            'balcony' => $this->balcony,
            'floor' => $this->floor,
            'floors-total' => $this->floorsTotal,
            'building-name' => $this->buildingName,
            'yandex-building-id' => $this->yandexBuildingId,
            'yandex-house-id' => $this->yandexHouseId,
            'building-section' => $this->buildingSection,
            'building-state' => $this->buildingState,
            'ready-quarter' => $this->readyQuarter,
            'built-year' => $this->builtYear,
            'building-phase' => $this->buildingPhase,
            'image' => $this->images,
            'description' => $this->description,
            'area' => $this->area,
            'living-space' => $this->livingSpace,
            'kitchen-space' => $this->kitchenSpace,
            'room-space' => $this->roomSpace,
        ];
    }
}
