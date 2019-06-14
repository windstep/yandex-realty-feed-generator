<?php

namespace App\Contracts;

use XMLWriter;

abstract class AbstractOffer
{
    /** @var XMLWriter */
    protected $engine;
    protected $properties = [];

    public function toXMLString(): string
    {
        $this->setupEngine();
        $this->engine->openMemory();
        $this->engine->startElement('offer');
        $this->engine->writeAttribute('internal-id', $this->id);

        foreach ($this->properties as $propertyName => $value) {
            $this->createElement($propertyName, $value);
        }

        $this->engine->fullEndElement();
        return $this->engine->flush(true);
    }

    public function setupEngine()
    {
        $this->engine = new XMLWriter();
    }

    public function propertyHasMethod(string $propertyMethod): bool
    {
        return method_exists($this, $propertyMethod);
    }

    public function getMethodNameFromProperty(string $propertyName): string
    {
        $snakeCase = ucwords(str_replace(['-', '_'], ' ', $propertyName));
        $studlyCase = lcfirst(str_replace(' ', '', $snakeCase));
        return "create{$studlyCase}Element";
    }

    public function __get($name)
    {
        return $this->properties[$name] ?? null;
    }

    protected function createElement(string $propertyName, $value)
    {
        $propertyMethod = $this->getMethodNameFromProperty($propertyName);
        if ($this->propertyHasMethod($propertyMethod)) {
            $this->{$propertyMethod}($value);
        } elseif (is_array($value)) {
            $this->writeArrayElement($propertyName, $value);
        } else {
            $this->writeElement($propertyName, $value);
        }
    }

    protected function writeArrayElement(string $propertyName, array $arrayElement)
    {
        $this->engine->startElement($propertyName);
        foreach ($arrayElement as $key => $value) {
            $this->createElement($key, $value);
        }
        $this->engine->fullEndElement();
    }

    protected function createImageElement($images)
    {
        foreach ($images as $image) {
            $this->writeElement('image', $image);
        }
    }

    protected function writeElement(string $elementName, string $value, array $attributes = [])
    {
        $this->engine->startElement($elementName);
        foreach ($attributes as $attributeName => $attributeValue) {
            $this->engine->writeAttribute($attributeName, $attributeValue);
        }
        $this->engine->text($value);
        $this->engine->fullEndElement();
    }
}
