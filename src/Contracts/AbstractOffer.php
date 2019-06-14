<?php

namespace App\Contracts;

abstract class AbstractOffer
{
    abstract public function toXMLString(): string;
}