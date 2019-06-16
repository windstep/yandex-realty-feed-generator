<?php

namespace Windstep\YRLGenerator;

use Windstep\YRLGenerator\Traits\FiltersArray;

class Offer extends AbstractOffer
{
    use FiltersArray;

    protected $id;
    protected $type;
    protected $propertyType;
    protected $category;

    protected $location;
    protected $metro = [];

    protected $url;
    protected $creationDate;

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
        $this->type = $type;
        return $this;
    }

    public function setPropertyType(PropertyType $propertyType)
    {
        $this->propertyType = $propertyType;
        return $this;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }
}
