<?php

namespace ApiSkeletons\OAuth2\Doctrine\Entity;

/**
 * AuthorizationCode
 */
class AuthorizationCode
{
    /**
     * @var string|null
     */
    private $authorizationCode;

    /**
     * @var string|null
     */
    private $redirectUri;

    /**
     * @var \DateTime|null
     */
    private $expires;

    /**
     * @var string|null
     */
    private $idToken;

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
     * Set authorizationCode.
     *
     * @param string|null $authorizationCode
     *
     * @return AuthorizationCode
     */
    public function setAuthorizationCode($authorizationCode = null)
    {
        $this->authorizationCode = $authorizationCode;

        return $this;
    }

    /**
     * Get authorizationCode.
     *
     * @return string|null
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Set redirectUri.
     *
     * @param string|null $redirectUri
     *
     * @return AuthorizationCode
     */
    public function setRedirectUri($redirectUri = null)
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }

    /**
     * Get redirectUri.
     *
     * @return string|null
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Set expires.
     *
     * @param \DateTime|null $expires
     *
     * @return AuthorizationCode
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
     * Set idToken.
     *
     * @param string|null $idToken
     *
     * @return AuthorizationCode
     */
    public function setIdToken($idToken = null)
    {
        $this->idToken = $idToken;

        return $this;
    }

    /**
     * Get idToken.
     *
     * @return string|null
     */
    public function getIdToken()
    {
        return $this->idToken;
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
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
     * @return AuthorizationCode
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
