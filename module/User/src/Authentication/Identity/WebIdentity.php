<?php

namespace User\Authentication\Identity;

use Zend\Permissions\Rbac\Role;
use ZF\MvcAuth\Identity\IdentityInterface;

final class WebIdentity extends Role implements IdentityInterface
{
    protected $identity;

    public function __construct($identity)
    {
        parent::__construct($identity->getRole()->first()->getRoleId());
        $this->identity = $identity;
    }

    public function getRoleId()
    {
        return $this->name;
    }

    public function getAuthenticationIdentity()
    {
        return $this->identity;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->identity->getId();
    }

    public function getUser()
    {
        return $this->getAuthenticationIdentity();
    }
}
