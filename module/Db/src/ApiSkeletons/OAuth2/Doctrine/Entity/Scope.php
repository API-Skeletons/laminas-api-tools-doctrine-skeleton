<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * Scope
 */
class Scope
{
    /**
     * @var string
     */
    private $scope;

    /**
     * @var bool|null
     */
    private $isDefault;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $client;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $authorizationCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $refreshToken;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $accessToken;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authorizationCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refreshToken = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accessToken = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set scope.
     *
     * @param string $scope
     *
     * @return Scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope.
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set isDefault.
     *
     * @param bool|null $isDefault
     *
     * @return Scope
     */
    public function setIsDefault($isDefault = null)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault.
     *
     * @return bool|null
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return Scope
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Add client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return Scope
     */
    public function addClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\Client $client
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClient(\ApiSkeletons\OAuth2\Doctrine\Entity\Client $client)
    {
        return $this->client->removeElement($client);
    }

    /**
     * Get client.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add authorizationCode.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode
     *
     * @return Scope
     */
    public function addAuthorizationCode(\ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode)
    {
        $this->authorizationCode[] = $authorizationCode;

        return $this;
    }

    /**
     * Remove authorizationCode.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAuthorizationCode(\ApiSkeletons\OAuth2\Doctrine\Entity\AuthorizationCode $authorizationCode)
    {
        return $this->authorizationCode->removeElement($authorizationCode);
    }

    /**
     * Get authorizationCode.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Add refreshToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken
     *
     * @return Scope
     */
    public function addRefreshToken(\ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken)
    {
        $this->refreshToken[] = $refreshToken;

        return $this;
    }

    /**
     * Remove refreshToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRefreshToken(\ApiSkeletons\OAuth2\Doctrine\Entity\RefreshToken $refreshToken)
    {
        return $this->refreshToken->removeElement($refreshToken);
    }

    /**
     * Get refreshToken.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Add accessToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken
     *
     * @return Scope
     */
    public function addAccessToken(\ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken)
    {
        $this->accessToken[] = $accessToken;

        return $this;
    }

    /**
     * Remove accessToken.
     *
     * @param \ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAccessToken(\ApiSkeletons\OAuth2\Doctrine\Entity\AccessToken $accessToken)
    {
        return $this->accessToken->removeElement($accessToken);
    }

    /**
     * Get accessToken.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
