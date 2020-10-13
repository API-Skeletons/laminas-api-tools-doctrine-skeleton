<?php

namespace UserApi\Hydrator\Strategy;

use DateTime;
use Laminas\Hydrator\Strategy\StrategyInterface;

class IntegerToDate implements
    StrategyInterface
{
    public function extract($value) {
        return (new DateTime())->setTimestamp($value);
    }

    public function hydrate($value) {
        return $value;
    }
}
