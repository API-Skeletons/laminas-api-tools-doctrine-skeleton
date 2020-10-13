<?php

namespace UserApi\Hydrator\Filter;

use Laminas\Hydrator\Filter\FilterInterface;

final class UserDefault implements FilterInterface
{
    public function filter($field)
    {
        $excludeFields = [
            'password',
            'salt',
            'activationCode',
            'forgottenPasswordCode',
            'forgottenPasswordTime',
            'rememberCode',
            'apikeyRead',
            'apikeyWrite',
            'client',
            'accessToken',
            'authorizationCode',
            'refreshToken',
        ];

        if (in_array($field, $excludeFields)) {
            return false;
        }

        return true;
    }
}
