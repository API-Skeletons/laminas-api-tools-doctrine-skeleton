<?php

namespace Db\Entity;

use Zend\Permissions\Acl\Role\RoleInterface;
use ApiSkeletons\OAuth2\Doctrine\Permissions\Acl\Role\HierarchicalInterface;

/**
 * Role
 */
class Role implements
    RoleInterface,
    HierarchicalInterface
{
    /**
     * @var string
     */
    private $roleId;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Db\Entity\Role
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    private $description;

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set roleId.
     *
     * @param string $roleId
     *
     * @return Role
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId.
     *
     * @return string
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add user.
     *
     * @param \Db\Entity\User $user
     *
     * @return Role
     */
    public function addUser(\Db\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user.
     *
     * @param \Db\Entity\User $user
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeUser(\Db\Entity\User $user)
    {
        return $this->user->removeElement($user);
    }

    /**
     * Get user.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set parent.
     *
     * @param \Db\Entity\Role|null $parent
     *
     * @return Role
     */
    public function setParent(\Db\Entity\Role $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return \Db\Entity\Role|null
     */
    public function getParent()
    {
        return $this->parent;
    }
}
