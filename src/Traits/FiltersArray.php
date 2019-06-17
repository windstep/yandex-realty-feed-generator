<?php

namespace Windstep\YRLGenerator\Traits;

trait FiltersArray
{
    private function filterArray(array $array)
    {
        $result = [];
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = $this->filterArray($value);
            }
            if (!empty($value) && $value != null) {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}