<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * RefreshToken
 */
class RefreshToken
{
    /**
     * @var string|null
     */
    private $refreshToken;

    /**
     * @var \DateTime|null
     */
    private $expires;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \ApiSkeletons\OAuth2\Doctrine\Entity\Client
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $scope;

    /**
     * @var \Db\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scope = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set refreshToken.
     *
     * @param string|null $refreshToken
     *
     * @return RefreshToken
     */
    public function setRefreshToken($refreshToken = null)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * Get refreshToken.
     *
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Set expires.
     *
     * @param \DateTime|null $expires
     *
     * @return RefreshToken
     */
    public function setExpires($expires = null)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires.
     *
     * @return \DateTime|null
     */
    public function getExpires()
    {
        return $this->expires;
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
     * Set client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return RefreshToken
     */
    public function setClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \ApiSkeletons\OAuth2\Doctrine\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add scope.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope
     *
     * @return RefreshToken
     */
    public function addScope(\ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope)
    {
        $this->scope[] = $scope;

        return $this;
    }

    /**
     * Remove scope.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeScope(\ApiSkeletons\OAuth2\Doctrine\Entity\Scope $scope)
    {
        return $this->scope->removeElement($scope);
    }

    /**
     * Get scope.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set user.
     *
     * @param \Db\Entity\User|null $user
     *
     * @return RefreshToken
     */
    public function setUser(\Db\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \Db\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
