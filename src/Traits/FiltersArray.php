<?php

namespace Windstep\YRLGenerator\Traits;

trait FiltersArray
{
    private function filterArray(array &$array)
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = $this->filterArray($value);
            }
            if (empty($value)) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}