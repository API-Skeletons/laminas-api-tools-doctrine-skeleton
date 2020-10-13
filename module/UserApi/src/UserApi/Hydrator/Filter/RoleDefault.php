<?php

namespace UserApi\Hydrator\Filter;

use Laminas\Hydrator\Filter\FilterInterface;

final class RoleDefault implements FilterInterface
{
    public function filter($field)
    {
        $excludeFields = [
            'user',
        ];

        if (in_array($field, $excludeFields)) {
            return false;
        }

        return true;
    }
}
