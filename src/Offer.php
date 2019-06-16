<?php

namespace Windstep\YRLGenerator;

use Windstep\YRLGenerator\Enums\Category;
use Windstep\YRLGenerator\Enums\Currency;
use Windstep\YRLGenerator\Enums\DealStatus;
use Windstep\YRLGenerator\Enums\PropertyType;
use Windstep\YRLGenerator\Enums\SalesAgentCategory;
use Windstep\YRLGenerator\Enums\Type;
use Windstep\YRLGenerator\Enums\Unit;
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
