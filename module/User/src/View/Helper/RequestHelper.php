<?php

namespace User\View\Helper;

use Zend\View\Helper\AbstractHelper;

final class RequestHelper extends AbstractHelper
{
    private $request;

    public function __invoke()
    {
        return $this->request;
    }

    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }
}
